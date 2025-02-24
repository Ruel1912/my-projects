import NextAuth from "next-auth";
import Google from "next-auth/providers/google";
import Vk from "next-auth/providers/vk";
import Credentials from "next-auth/providers/email";
import Yandex from "next-auth/providers/yandex";
import { MongoDBAdapter } from "@auth/mongodb-adapter";
import clientPromise from "@/app/database/mongodb";
import { createTransport } from "nodemailer";
let email;
const html = ({ url, host, theme, token, identifier }) => {
  const escapedHost = host.replace(/\./g, "&#8203;.");
  email = identifier;
  const brandColor = theme.brandColor || "#346df1";
  const color = {
    background: "#f9f9f9",
    text: "#444",
    mainBackground: "#fff",
    buttonBackground: brandColor,
    buttonBorder: brandColor,
    buttonText: theme.buttonText || "#fff",
  };

  return `
<div>
  <h1 style='margin: 0 0 1rem;'>Необходимо подтвердить адрес<br>электронной почты для входа в аккаунт </h1>
  <p><b>Добрый день!</b><br>
  Вы получили это письмо, потому что выбрали этот адрес электронной почты в<br>
  качестве входа в аккаунт Пардоставки<br>
  Для подтверждения этого адреса введите следующий код на странице подтверждения
  <br>адреса электронной почты:</p>
  <p style="font-size: 18px;
   font-family: Helvetica, Arial, sans-serif; 
    color: #6B35F5; 
    text-decoration: none;
    font-size: 2rem;
    padding: 0;
    margin: 0;
    font-weight: bold;">
    ${token}
  </p>
  <p><b><i>Скрок действия кода - 10 минут с момента отправки сообщения.</i></b></p>
  <p><b>Почему Вы получили это сообщение</b></p>
  <div>
    —  Вы хотите создать или войти в аккаунт сервиса Paravoz<br>
    —  Вы попытались зайти в систему с другого компьютера или иного устройства<br>
    —  Вы используете другой браузер<br>
    —  Кто-то другой пытается получить доступ к вашему аккаунту<br>
  </div>
  <br>
  <div><i>Служба технической поддержки Paravoz</i></div>
  <div><a style='text-decoration: underline; color: #6B35F5;' href='tel:+7 (995) 908 52-81'>+7 (995) 908 52-81</a></div>
  <div><a style='text-decoration: underline; color: #6B35F5;' href='https://t.me/par_delivery'>ТГ</a></div>
</div>
`;
};

const apiVersion = "5.131";
const authConfig = {
  adapter: MongoDBAdapter(clientPromise),
  providers: [
    Google({
      clientId: process.env.GOOGLE_ID,
      clientSecret: process.env.GOOGLE_SECRET,
    }),
    Vk({
      clientId: process.env.VK_ID,
      clientSecret: process.env.VK_SECRET,
      authorization: `https://oauth.vk.com/authorize?scope=offline,email,phone_number&v=${apiVersion}`,
    }),
    Yandex({
      clientId: process.env.YANDEX_ID,
      clientSecret: process.env.YANDEX_SECRET,
      authorization:
        "https://oauth.yandex.ru/authorize?scope=login:default_phone+login:email+login:info+login:avatar",
    }),
    Credentials({
      server: {
        host: process.env.EMAIL_SERVER_HOST,
        port: process.env.EMAIL_SERVER_PORT,
        secure: process.env.EMAIL_SERVER_SECURE === 'true',
        auth: {
          user: process.env.EMAIL_SERVER_USER,
          pass: process.env.EMAIL_SERVER_PASSWORD,
        },
      },
      from: process.env.EMAIL_FROM,
      async generateVerificationToken() {
        let min = 1000;
        let max = 9999;
        min = Math.ceil(min);
        max = Math.floor(max);

        return Math.floor(Math.random() * (max - min + 1)) + min;
      },
      async sendVerificationRequest(params) {
        const { identifier, url, provider, theme, token } = params;
        const { host } = new URL(url);
        // NOTE: You are not required to use `nodemailer`, use whatever you want.
        const transport = createTransport(provider.server);
        const result = await transport.sendMail({
          to: identifier,
          from: provider.from,
          subject: `Необходимо подтвердить адрес
          электронной почты для входа в аккаунт`,
          text: `Sign in to ${host}\n${url}\n\n`,
          html: html({ url, host, theme, token, identifier }),
        });
        const failed = result.rejected.concat(result.pending).filter(Boolean);
        console.log('failed auth', failed);
        if (failed.length) {
          throw new Error(`Email(s) (${failed.join(", ")}) could not be sent`);
        }
      },
    }),
  ],
  session: {
    // Set it as jwt instead of database
    strategy: "jwt",
  },
  pages: {
    verifyRequest: "/login/verifyRequest",
  },

  callbacks: {
    async session({ session, token }) {
      session.user.id = token.id;
      return session;
    },
    async jwt({ token, user, account }) {
      if (user) {
        token.id = user.id;
      }
      return token;
    },
  },
};

const handler = NextAuth(authConfig);
export { handler as GET, handler as POST };

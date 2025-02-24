import LayoutMain from "@/components/layoutMain/LayoutMain";
import styles from "./page.module.css";
import { HeaderTwo } from "@/components/header/header";
import Cat from "./profileIco.svg";
import Image from "next/image";
import { BlueButtonBig } from "@/components/Buttons/Buttons";
import google from "./socialSvg/google 1.svg";
import vk from "./socialSvg/Vector.svg";
import yandex from "./socialSvg/Subtract.svg";
import { SideBarProvider } from "@/context/SideBarContext";
import { SignInButton } from "@/components/Buttons/SignInButton";
import { getServerSession } from "next-auth";
import { redirect } from "next/navigation";
import Link from "next/link";
import { CustomCheckBox } from "@/components/CustomCheckBox/CustomCheckBox";
import LoginForm from "@/components/LoginForm/LoginForm";
import { HeaderLeftNav } from "@/components/header/HeaderSidebarBtn";

const Login = async () => {
  const session = await getServerSession();
  if (session !== null) {
    redirect("/main");
  } else {
    return (
      <SideBarProvider>
        <HeaderLeftNav />
        <LayoutMain>
          <HeaderTwo nav="no" />
          <div
            style={{
              marginTop:'64px',
              height: "100%",
              boxShadow: "0px -18px 18px 0px rgba(32, 51, 79, 0.08)",
              borderRadius: '28px 28px 0px 0px',
              display:'flex',
              flexFlow:'column nowrap'
            }}
          >
            <div className={styles.mainContent}>
              <h4>Вход в акаунт:</h4>
              <div className={styles.helloContent}>
                <div>
                  <Image width={86} height={94} src={Cat} alt="Профиль" />
                </div>
                <h5>Добро пожаловать</h5>
                <p>
                  Введите вашу почту, чтобы войти или
                  <br />
                  зарегистрироваться
                </p>
              </div>

              <LoginForm signIn="email" />

              {/* <div className={styles.helpFooter}>
              <span>Нет аккаунта?</span>
              <Link className={styles.helpLink} href="/register">
                Зарегистрировать
              </Link>
            </div> */}
            </div>
            <div className={styles.separator}>
              <span className={styles.separatorText}>или войти через</span>
            </div>
            <div className={styles.social}>
              <SignInButton signIn="google" src={google} alt="Google" />
              <SignInButton signIn="vk" src={vk} alt="vk.com" />
              <SignInButton signIn="yandex" src={yandex} alt="yandex" />
            </div>
            <div className={styles.footer}>
              <p>Продолжая, вы соглашаетесь</p>
              <p style={{ color: "#6B35F5" }}>
                на сбор и обработку персональных данных
              </p>
            </div>
          </div>
        </LayoutMain>
      </SideBarProvider>
    );
  }
};

export default Login;

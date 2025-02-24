import "./globals.css";
import { Inter } from "next/font/google";
import "@/icons/style.css";

// export const metadata = {
//   title: "Пар Доставка",
//   description: "Лучше вкинуться, чем откинуться.",
//   viewport:
//     "width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no",
//   robots: "noindex",
// };

const font = Inter({
  weight: ["400", "500", "600"],
  style: "normal",
  subsets: ["latin"],
});

export default function RootLayout({ children }) {
  return (
    <html id="root" style={font.style} lang="ru">
      <body>{children}</body>
    </html>
  );
}

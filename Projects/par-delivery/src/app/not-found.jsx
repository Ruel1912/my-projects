import Header from "@/components/header/header";
import LayoutMain from "@/components/layoutMain/LayoutMain";
import { SideBarProvider } from "@/context/SideBarContext";
import Link from "next/link";
import React from "react";
import style from "./not-found.module.css";
import cat from "../components/not-found/not-found-image.svg";
import Image from "next/image";
const NotFound = () => {
  return (
    <SideBarProvider>
      <LayoutMain>
        <Header />
        <div className={style.Page404}>
          <Image width={cat.width} height={cat.height} src={cat} alt=""></Image>
          <h2 className={style.Page404HeadText}>Оооой!</h2>
          <p className={style.Page404Paragraph}>Что-то пошло не так.</p>
          <p className={style.Page404Paragraph}>
            Мы не смогли найти нужную страницу
          </p>
          <Link className={style.Page404Link} href="/main">
            На главную
          </Link>
        </div>
      </LayoutMain>
    </SideBarProvider>
  );
};

export default NotFound;

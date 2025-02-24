"use client";
import { Dialog } from "@headlessui/react";
import { useState } from "react";
import styles from "./header.module.css";

import Image from "next/image";
import logo from "./logoText.svg";
import logoDef from "./logoText.svg";
import cat from "../layoutMain/profileIco.svg";

import { NavButton } from "../layoutMain/NavButton";
import { useSession } from "next-auth/react";
import { usePathname } from 'next/navigation';

export const HeaderSidebarBtn = () => {
  const [isOpen, setIsOpen] = useState(false);

  const session = useSession();

  let navBar;
  if (session) {
    navBar = [
      { id: 0, link: "/order", ico: "ic_Bag", title: "Заказы" },
      { id: 1, link: "/profile", ico: "ic_Profile", title: "Мой аккаунт" },
      { id: 2, link: "/support", ico: "ic_Message", title: "Поддержка" },
      { id: 3, link: "/login", ico: "ic_Login", title: "Войти" },
    ];
  }
  if (!session) {
    navBar = [
      { id: 0, link: "/support", ico: "ic_Message", title: "Поддержка" },
      { id: 1, link: "/login", ico: "ic_Login", title: "Войти" },
    ];
  }
  return (
    <>
      <button
        style={{ outline: "unset" }}
        onClick={() => {
          setIsOpen(true);
        }}
      >
        <i className="ic_Category" />
      </button>
      <Dialog open={isOpen} onClose={() => setIsOpen(false)}>
        <div className={styles.bg}>
          <aside>
            <Dialog.Panel className={styles.panel}>
              <Dialog.Title className={styles.popupHead}>
                <button
                  className={styles.backSidebar}
                  style={{ outline: "unset" }}
                  onClick={() => {
                    setIsOpen(false);
                  }}
                >
                  <i className="ic_Close-Square" />
                </button>
                <Image quality={100} src={logo} alt="parovoz" />
              </Dialog.Title>
              <div className={styles.ProfileInfo}>
                <Image quality={100} alt="" src={cat} />
                <div>
                  <span>Привет,</span>
                  <span>{session?.data?.user?.name != null
                      ? session.data.user.name
                      : "Пользователь"}</span>
                </div>
              </div>
              <nav className={styles.Navigation}>
                {navBar.map((el, index) => (
                  <NavButton
                    NavButton={styles.NavButton}
                    NavButtonLink={styles.NavButtonLink}
                    key={index}
                    link={el.link}
                    ico={el.ico}
                  >
                    {el.title}
                  </NavButton>
                ))}
              </nav>
              {/* <RofelPhrase /> */}
              <p className={styles.Version}>
                Версия сайта 5.1
                {/* Создано @Bj and @Spaggety
                <br /> */}
              </p>
            </Dialog.Panel>
          </aside>
        </div>
      </Dialog>
    </>
  );
};
export const HeaderLeftNav = () => {
  const session = useSession();
  const pathname = usePathname();


  let navBar;
  if (session) {
    navBar = [
      { id: 4, link: "/main", ico: "ic_Home", title: "На главную" },
      { id: 1, link: "/profile", ico: "ic_Profile", title: "Мой аккаунт" },
      { id: 5, link: "/search", ico: "ic_Search", title: "Поиск" },
      { id: 6, link: "/liked", ico: "ic_Heart", title: "Избранные товары" },
      { id: 7, link: "/card", ico: "ic_Buy", title: "Корзина" },
      { id: 0, link: "/order", ico: "ic_Bag", title: "Заказы" },
      { id: 2, link: "/support", ico: "ic_Message", title: "Поддержка" },
      { id: 3, link: "/login", ico: "ic_Login", title: "Войти" },
    ];
  }
  if (!session) {
    navBar = [
      { id: 0, link: "/support", ico: "ic_Message", title: "Поддержка" },
      { id: 1, link: "/login", ico: "ic_Login", title: "Войти" },
    ];
  }
  return (
    <div className={styles.HeaderLeftNav}>
      <Image width={148} src={logoDef} alt="parovoz" />
      <nav style={{ width: "224px" }} className={styles.Navigation}>
        {navBar.map((el, index) => (
          <NavButton
            NavButton={pathname === el.link ? styles.NavButtonActive : styles.NavButton}
            NavButtonLink={styles.NavButtonLink}
            key={index}
            link={el.link}
            ico={el.ico}
          >
            {el.title}
          </NavButton>
        ))}
      </nav>
    </div>
  );
};
let RofelPhrase = (props) => {
  return (
    <div className="RofelPhrase">
      <p>“Лучше вкинуться, чем откинуться”</p>
      <span>© Джейсон Стетхем</span>
    </div>
  );
};

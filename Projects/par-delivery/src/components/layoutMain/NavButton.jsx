"use client";
import Link from "next/link";
import { signOut, useSession } from "next-auth/react";
import { useState } from "react";
import { ModalPanel } from "../ModalPanel/ModalPanel";
import { BlueButton } from "../Buttons/Buttons";
import { PopupHeader, PopupSwipe } from "../CartCard/CartCard";

export const NavButton = (props) => {
  const session = useSession();
  const [isOpen, setIsOpen] = useState(false);
  const logout = () => signOut({ callbackUrl: "/login" });

  // const URL_API=`https://api.telegram.org/bot${ process.env.PAR_SUPPORT_TOKEN }/sendMessage`

  return props.children === "Войти" && session?.status === "authenticated" ? (
    <>
      <Link className={props.NavButtonLink} href="#">
        <button className={props.NavButton} onClick={() => setIsOpen(true)}>
          <i className={props.ico} />
          Выйти из аккаунта
        </button>
      </Link>
      <ModalPanel
        ico="ic_Danger-Triangle"
        title={"Выйти из профиля?"}
        isOpen={isOpen}
        setIsOpen={setIsOpen}
      >
        <div style={{ display: "flex", gap: "20px" }}>
          <BlueButton
            onClick={logout}
            style={{
              boxShadow: "0px 1px 12px 0px rgba(32, 51, 79, 0.12)",
              width: "120px",
              fontSize: "14px",
            }}
          >
            Выйти
          </BlueButton>
          <BlueButton
            onClick={() => {
              setIsOpen(false);
            }}
            style={{
              background: "#E1E6F7",
              color: "#6B35F5",
              boxShadow: "0px 1px 12px 0px rgba(32, 51, 79, 0.12)",
              width: " 120px",
              fontSize: "14px",
            }}
          >
            Отменить
          </BlueButton>
        </div>
      </ModalPanel>
    </>
  ) : props.children === "Заказы" && session?.status !== "authenticated" ? (
    <></>
  ) : props.children === "Мой аккаунт" &&
    session?.status !== "authenticated" ? (
    <></>
  ) : (
    <Link className={props.NavButtonLink} href={props.link}>
      <button className={props.NavButton}>
        <i className={props.ico} />
        {props.children}
      </button>
    </Link>
  );
};

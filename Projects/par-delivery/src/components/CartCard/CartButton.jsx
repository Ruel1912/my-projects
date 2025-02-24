"use client";
import styles from "./CartCard.module.css";
import { CardContext } from "@/context/CardContext";
import { useContext, useEffect, useState } from "react";
import { BlueButton, BlueButtonBig } from "../Buttons/Buttons";
import Link from "next/link";
import { useSession } from "next-auth/react";
import { ModalPanel } from "../ModalPanel/ModalPanel";

export const CartCardButtonHome = (props) => {
  return (
    <footer style={props.style} className={styles.Footer}>
      <Link href="/">
        <BlueButtonBig>Вернуться на главную</BlueButtonBig>
      </Link>
    </footer>
  );
};

export const CartCardButtonBusket = (props) => {
  const { globalCard, setMyLocate } = useContext(CardContext);
  const [active, setActive] = useState();

  const key = "cardProdusts";
 
  const session = useSession();
  const [isOpen, setIsOpen] = useState(false);
  useEffect(() => {
    const existingData = localStorage.getItem(key);
    if (
      existingData === undefined ||
      existingData === "[]" ||
      existingData === null
    ) {
      setActive(false);
    } else {
      setActive(true);
    }
  }, [globalCard]);
  return (
    <footer className={`${styles.FooterBasket} ${styles.Footer}`}>
      {active ? (
        <div className={styles.nextButton}>
          <div className={styles.nextButtonInfo}>
            <h4>{props.price != 0 ? props.price : "Загрузка..."}</h4>
            <span>30 - 90 мин</span>
          </div>
          <BlueButtonBig
            onClick={
              session?.status === "authenticated"
                ? () => {
                    setMyLocate((l) => l + 1);
                  }
                : () => {
                    setIsOpen(true);
                  }
            }
          >
            Верно, продолжить
          </BlueButtonBig>
          <ModalPanel
            ico="ic_Danger-Triangle"
            title={"Вы не авторизованы!"}
            isOpen={isOpen}
            setIsOpen={setIsOpen}
          >
            <p
              style={{
                display: "flex",
                color: "#8F92A1",
                fontSize: "10px",
                fontWeight: "400",
                width: "70%",
                textAlign: "center",
                marginTop: "-14px",
              }}
            >
              Для того чтоб продолжить,
              <br /> вам необходимо войти в аккаунт, перейти к входу?
            </p>
            <div style={{ display: "flex", gap: "20px" }}>
              <Link href="/login">
                <BlueButton
                  // onClick={logout}
                  style={{
                    boxShadow: "0px 1px 12px 0px rgba(32, 51, 79, 0.12)",
                    width: "120px",
                    fontSize: "14px",
                  }}
                >
                  Войти
                </BlueButton>
              </Link>
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
        </div>
      ) : (
        <Link href="/">
          <BlueButtonBig>Вернуться на главную</BlueButtonBig>
        </Link>
      )}
    </footer>
  );
};

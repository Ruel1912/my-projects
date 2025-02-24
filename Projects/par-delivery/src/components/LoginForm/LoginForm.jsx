"use client";
import React, { useEffect, useRef, useState } from "react";
import { CustomCheckBox } from "../CustomCheckBox/CustomCheckBox";
import Link from "next/link";
import { BlueButtonBig } from "../Buttons/Buttons";
import styles from "../../app/login/page.module.css";
import { signIn } from "next-auth/react";
import { useSearchParams } from "next/navigation";
const LoginForm = (props) => {
  const [valueMail, setValueMail] = useState();
  const [seeType, setSeeType] = useState("password");
  const ref = useRef();
  const swapeSee = () => {
    if (seeType === "password") {
      setSeeType("text");
    }
    if (seeType === "text") {
      setSeeType("password");
    }
  };

  const [valuePassword, setValuePassword] = useState("");
  const setPassword = (event) => {
    setValuePassword(event.target.value);
  };
  return (
    <>
      <div className={styles.inputPhone}>
        <i className="ic_Message" />
        <div className={styles.inputContain}>
          <input
            onChange={(e)=>setValueMail(e.target.value)}
            type="email"
            autoComplete="email"
            placeholder="Email"
          />
        </div>
      </div>
      {/* <div className={styles.inputPhone}>
        <i className={valuePassword.length > 0 ? "ic_Lock" : "ic_Unlock"} />
        <div className={styles.inputContain}>
          <input
            onChange={setPassword}
            type={seeType}
            autocomplete="current-password"
            placeholder="Введите пароль"
          />
          <button className={styles.passSee} onClick={swapeSee} type="button">
            <i className={seeType === "password" ? "ic_See" : "ic_Not-See"} />
          </button>
        </div>
      </div> */}
      {/* <div className={styles.CheckPassword}>
        <CustomCheckBox>Запомнить данные</CustomCheckBox>
        <Link className={styles.helpLink} href="#">
          Забыли пароль?
        </Link>
      </div> */}
      <Link href={`/login/verifyRequest/?email=${valueMail}`}>
        <BlueButtonBig
          // type="submit"
          onClick={() => {
            signIn("email", { email: valueMail, redirect: false });
            // console.log(valueMail)
          }}
          style={{ marginTop: "14px" }}
        >
          Войти
        </BlueButtonBig>
      </Link>
    </>
  );
};

export default LoginForm;

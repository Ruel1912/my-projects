"use client";
import { useEffect, useState } from "react";
import styles from "./verifyRequestLogic.module.css";
import { color } from "framer-motion";
import { redirect } from "next/navigation";

const VerifyRequestLogic = ({ email }) => {
  const [value, setValue] = useState("");
  useEffect(() => {
    if (value.length == 4) {
      redirect(
        `/api/auth/callback/email?callbackUrl=https%3A%2F%2Fpar-delivery.ru%2Flogin&token=${value}&email=${email}`
      );
    }
  }, [value]);
  return (
    <div className={styles.verifyRequestLogic}>
      {/* <input  maxLength={4} /> */}
      <span>
        {value[0] ? (
          <span style={{ color: "#6B35F5" }}>{value[0]}</span>
        ) : (
          <span>●</span>
        )}
        {value[1] ? (
          <span style={{ color: "#6B35F5" }}>{value[1]}</span>
        ) : (
          <span>●</span>
        )}
        {value[2] ? (
          <span style={{ color: "#6B35F5" }}>{value[2]}</span>
        ) : (
          <span>●</span>
        )}
        {value[3] ? (
          <span style={{ color: "#6B35F5" }}>{value[3]}</span>
        ) : (
          <span>●</span>
        )}
      </span>
      <input
        onChange={(e) => setValue(e.target.value)}
        type="text"
        inputMode="numeric"
        minLength="4"
        maxLength="4"
      />
    </div>
  );
};

export default VerifyRequestLogic;

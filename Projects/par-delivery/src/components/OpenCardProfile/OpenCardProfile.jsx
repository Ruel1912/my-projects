"use client";
import { useState } from "react";
import styles from "./OpenCardProfile.module.css";

export const OpenCardProfile = (props) => {
  const [open, setOpen] = useState(false);
  return (
    <div className={styles.contan}>
      <div className={styles.openCard}>
        <i className={props.ic_Name} />
        <div>
          <h4>{props.text}</h4>
          <p>{props.sub}</p>
        </div>
        <button onClick={() => setOpen(!open)} className={styles.openBtn}>
          <i className={open === true ? "ic_Arrow-Up" : "ic_Arrow-Down"} />
        </button>
      </div>
      <div>{open === true && props.children}</div>
    </div>
  );
};

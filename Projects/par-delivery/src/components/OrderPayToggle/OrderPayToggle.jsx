"use client";
import { useEffect, useState } from "react";
import styles from "./OrderPayToggle.module.css";

const OrderPayToggle = ({ enabled, setEnabled,setCashValue }) => {
  
  return (
    <>
      <div className={styles.Contain}>
        <button
          onClick={() => {
            setEnabled(true);
          }}
          className={enabled ? styles.active : styles.disable}
        >
          Оплата переводом
        </button>
        <button
          onClick={() => {
            setEnabled(false);
          }}
          className={enabled ? styles.disable : styles.active}
        >
          Оплата наличными
        </button>
      </div>
      {!enabled && (
        <div className={styles.addCash}>
          <i className="ic_Wallet" />
          <span>Нужна сдача:</span>
          <input
            min={0}
            step={1}
            onChange={(e) => setCashValue(e.target.value)}
            type="number"
            placeholder="Введите сумму"
          />
        </div>
      )}
    </>
  );
};

export default OrderPayToggle;

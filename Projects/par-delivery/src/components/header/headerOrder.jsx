"use client";
import { CardContext } from "@/context/CardContext";
import styles from "./header.module.css";
import Link from "next/link";
import { useContext, useEffect, useState } from "react";

export const HeaderOrder = () => {
  const { myLocate, setMyLocate, typeOrder, setTypeOrder } = useContext(CardContext);
  useEffect(() => {
    setMyLocate(-1);
  }, []);
  const DeleteButton = () => {
    localStorage.removeItem("cardProdusts");
  };

  return (
    <header className={styles.HeaderOrderContan}>
      <div className={styles.HeaderOrder}>
        {myLocate === -1 || myLocate === 0 ? (
          <Link href="/main">
            <div>
              <button>
                <i className="ic_Arrow---Left-2" />
              </button>
            </div>
          </Link>
        ) : myLocate >= 2 ? (
          <div
            style={{
              display: "flex",
              alignItems: "center",
              justifyContent: "start",
              gap: "10px",
            }}
          >
            <i className="ic_Apply" style={{ color: "#ffffff", background: "#21AE0A" }} />
            <h3 style={{ fontSize: "15px", fontWeight: 600 }}>Успешно!</h3>
          </div>
        ) : (
          <a>
            <div>
              <button
                onClick={() => {
                  setMyLocate((l) => l - 1);
                }}
              >
                <i className="ic_Arrow---Left-2" />
              </button>
            </div>
          </a>
        )}
        <div>
          <button onClick={myLocate > 0 ? () => setMyLocate(0) : null}>
            <i
              className="ic_Bag"
              style={
                myLocate >= 0
                  ? { background: "#6B35F5", color: "#fff", border: 'none' }
                  : { color: "#6B35F5", border: 'none' }
              }
            />
          </button>
          <Sdvg />
          <button onClick={myLocate > 1 ? () => setMyLocate(1) : null}>
            <i
              className="ic_Location"
              style={
                myLocate >= 1
                  ? { background: "#6B35F5", color: "#fff", border: 'none' }
                  : { color: "#6B35F5", border: 'none' }
              }
            />
          </button>
          <Sdvg />
          <button onClick={myLocate > 2 ? () => setMyLocate(2) : null}>
            <i
              className="ic_Tick-Square"
              style={
                myLocate >= 2
                  ? { background: "#6B35F5", color: "#fff", border: 'none' }
                  : { color: "#6B35F5", border: 'none' }
              }
            />
          </button>
        </div>
      </div>
      {myLocate !== -1 && myLocate < 2 ? (
        <div className={styles.HeadOrder}>
          <h3
            style={{
              fontSize: "14px",
              fontWeight: 600,
            }}
          >
            {myLocate == 0
              ? "Корзина:"
              : typeOrder == 0
                ? ""
                : ""
            }
          </h3>
          {myLocate === 0 && (
            <Link href="/basket">
              <button onClick={DeleteButton} className={styles.DeleteButton}>
                <i className="ic_Delete" />
              </button>
            </Link>
          )}
          {/* {myLocate === 0 ? (
            <Link href="/basket">
              <button onClick={DeleteButton} className={styles.DeleteButton}>
                <i className="ic_Delete" />
              </button>
            </Link>
          ) : typeOrder == false ? (
            <button
              onClick={() => setTypeOrder(true)}
              className={styles.TypeSwapeButton}
            >
              <span>Самовывоз</span> <i className="ic_Arrow-Right-Full" />
            </button>
          ) : (
            <button
              onClick={() => setTypeOrder(false)}
              className={styles.TypeSwapeButton}
            >
              <span>Доставка на адрес</span>
              <i className="ic_Arrow-Right-Full" />
            </button>
          )} */}
        </div>
      ) : (
        <></>
      )}
    </header>
  );
};

const Sdvg = () => {
  return (
    <svg
      xmlns="http://www.w3.org/2000/svg"
      width="27"
      height="2"
      viewBox="0 0 27 2"
      fill="none"
    >
      <path
        d="M0.5 1H26.5"
        stroke="#6B35F5"
        strokeLinecap="square"
        strokeDasharray="3 3 3 3"
      />
    </svg>
  );
};

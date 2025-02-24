"use client";
import styles from "./OrderContent.module.css";
import Link from "next/link";
import Bag from "./Bag.svg";
import Image from "next/image";
import { useEffect, useState } from "react";
import { useSession } from "next-auth/react";
export const OrderContent = () => {
  const [orders, setOrders] = useState([]);
  const [tab, setTab] = useState("Все");
  const session = useSession();

  useEffect(() => {
    if (session.status == "authenticated") {
      var requestOptions = {
        method: "GET",
        redirect: "follow",
      };

      fetch(
        `/api/orders?userid=${session.data.user.id}`,
        requestOptions
      )
        .then((response) => response.json())
        .then((result) => setOrders(result.orders))
        .catch((error) => console.log("error", error));
    }
  }, [session]);

  const buttons = ["Все", "Активные", "Самовывоз"];
  return (
    <div style={{ paddingBottom: "100px" }} className={styles.place}>
      <div style={{ display: "flex", gap: "10px", marginBottom: "18px" }}>
        {buttons.map((el, index) => (
          <button
            key={index}
            onClick={() => setTab(el)}
            className={tab === el ? styles.active : ''}
          >
            {el}
          </button>
        ))}
      </div>
      {!orders.length ? (<OrderFree />) : (
        orders.toReversed().map((el) =>
        (
          <div key={el._id}>
            {tab === "Все" && (
              <Link href={`order/${el._id}`}>
                <OrderCard el={el} />
              </Link>
            )}
            {tab === "Активные" && el.state === "Активный" && (
              <Link href={`order/${el._id}`}>
                <OrderCard el={el} />
              </Link>
            )}
            {tab === "Самовывоз" && el.type === "Самовывоз" && (
              <Link href={`order/${el._id}`}>
                <OrderCard el={el} />
              </Link>
            )}
          </div>
        ))
      )
      }
    </div>
  );
};

const OrderFree = () => {
  return (
    <div className={styles.OrderFree}>
      <h3>У Вас пока нет заказов</h3>

      <div className={styles.LowLine}>
        <div>
          <p>Но вы можете это исправить</p>
          <div>
            {Array.from({ length: 4 }).map((_, index) => (
              <i key={index} className="ic_Image" />
            ))}
          </div>
        </div>
        <Image alt="" src={Bag} width={44} height={44} />
      </div>
    </div>
  );
};

export const OrderCard = (props) => {
  const Month = [
    { id: 1, month: "января" },
    { id: 2, month: "фераля" },
    { id: 3, month: "марта" },
    { id: 4, month: "апреля" },
    { id: 5, month: "мая" },
    { id: 6, month: "июня" },
    { id: 7, month: "июля" },
    { id: 8, month: "августа" },
    { id: 9, month: "сентября" },
    { id: 10, month: "октября" },
    { id: 11, month: "ноября" },
    { id: 12, month: "декабря" },
  ];
  return (
    <div className={styles.OrderCard}>
      <div className={styles.InfoContan}>
        <div>
          <h3>Заказ #{props.el._id.substring(props.el._id.length - 5)}</h3>
          <p>
            {props.el.activeDate.slice(0, 2)}{" "}
            {/* {Month.find((el) => el.id == props.el.activeDate.slice(3, 5)).month}{" "} */}
            {props.el.activeTimeId}
          </p>
        </div>

        <div>
          <h3>{props.el.sum}₽</h3>
          <p
            className={`
            ${props.el.state == "Активный" ? styles.activeP : ''} 
            ${props.el.state == "Отменен" ? styles.cancelP : ''} 
            ${props.el.state == "Выполнен" ? styles.complitedP : ''}
            `}
          >
            {props.el.state}
          </p>
        </div>
      </div>

      <div className={styles.ImageContan}>
        {props.el.products && props.el.products?.length ? (
          props.el.products.map((el) => (
            <div key={el.id} className={styles.image}>
              {!el.assortment.images.rows[0] ? (
                <i className="ic_Image" />
              ) : (
                <Image src={
                  (el.assortment.images.rows[0].miniature
                    .downloadHref) ||
                  Bag.src
                } alt={''} width={44} height={44} />
              )}
            </div>
          ))

        ) : null}
      </div>
    </div>
  );
};

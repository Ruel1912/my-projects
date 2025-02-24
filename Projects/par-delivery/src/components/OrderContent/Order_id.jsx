"use client";
import styles from "@/app/order/page.module.css";
import { useEffect, useState } from "react";
import { ModalPanel } from "../ModalPanel/ModalPanel";
import { BlueButton } from "../Buttons/Buttons";
import Link from "next/link";
import { redirect } from "next/navigation";
import Image from 'next/image';

export const OrderCardId = ({ id }) => {
  const [info, setInfo] = useState();
  const [isOpenDelete, setIsOpenDelete] = useState(false);
  const [isOpenSupport, setIsOpenSupport] = useState(false);
  const [isOpenReview, setIsOpenReview] = useState(false);
  const [isOpenReOrder, setIsOpenReOrder] = useState(false);
  useEffect(() => {
    var requestOptions = {
      method: "GET",
      redirect: "follow",
    };

    fetch(`/api/oneorder?id=${id}`, requestOptions)
      .then((response) => response.json())
      .then((result) => setInfo({ ...result.orders[0] }))
      .catch((error) => console.log("error", error));
  }, [id]);

  info && console.log(info);

  const delete_Order = () => {
    var requestOptions = {
      method: "DELETE",
      redirect: "follow",
    };
    fetch(`/api/oneorder?id=${id}`, requestOptions)
      .then((response) => response.json())
      .catch((error) => console.log("error", error));
  };
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
    <div
      style={{
        width: "100%",
        boxShadow: "0px 1px 12px 0px rgba(32, 51, 79, 0.12)",
        height: "100vh",
        borderRadius: "24px 24px 0 0",
        padding:'20px'
      }}
    >
      <div
        // style={{ marginLeft: "20px", marginRight: "20px" }}
        className={styles.OrderCard}
      >
        <div
          style={{
            // marginLeft: "auto",
            // marginRight: "auto",
            // maxWidth: "350px",
          }}
        >
          <div className={styles.InfoContan}>
            <div>
              <h3>Ваш заказ:</h3>
              <p>
                {info?.activeDate.slice(0, 2)}{" "}
                {
                  Month.find((el) => el.id == info?.activeDate.slice(3, 5))
                    ?.month
                }{" "}
                {info?.activeTimeId}
              </p>
            </div>

            <div>
              <h3>{info?.sum}₽</h3>
              <p className={styles.activeP}>{info?.state}</p>
            </div>
          </div>
          <p className={styles.address} style={{marginBottom: '1rem'}}>
            <span>На адрес:</span> {info?.activeAddress.address}, подъезд{" "}
            {info?.activeAddress.porch}, этаж {info?.activeAddress.floor},
            квартира {info?.activeAddress.apartment}
          </p>
          <div className={styles.ButtonModalLine}>
            <ButtonModal
              onClick={() => setIsOpenDelete(true)}
              ic_Name="ic_Delete"
            >
              Удалить
            </ButtonModal>
            <ModalPanel
              ico="ic_Delete"
              icoColor="#2b2b2b"
              title={`Удалить заказ #${id.substring(id.length - 5)}?`}
              isOpen={isOpenDelete}
              setIsOpen={setIsOpenDelete}
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
                Это действие невозвожно отменить
              </p>
              <div style={{ display: "flex", gap: "20px" }}>
                <Link href={"/order"}>
                  <BlueButton
                    onClick={() => (delete_Order(), setIsOpenDelete(false))}
                    style={{
                      boxShadow: "0px 1px 12px 0px rgba(32, 51, 79, 0.12)",
                      width: "120px",
                      fontSize: "14px",
                    }}
                  >
                    Удалить
                  </BlueButton>
                </Link>
                <BlueButton
                  onClick={() => {
                    setIsOpenDelete(false);
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

            <ButtonModal
              onClick={() => setIsOpenSupport(true)}
              ic_Name="ic_Message"
            >
              Поддержка
            </ButtonModal>
            <ModalPanel
              ico="ic_Message"
              icoColor="#6B35F5"
              title={`Проблемы с заказом? `}
              isOpen={isOpenSupport}
              setIsOpen={setIsOpenSupport}
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
                Опишите вашу проблему и укажите <br />
                контакты для обратной связи
              </p>
              <div style={{ display: "flex", gap: "20px" }}>
                <BlueButton
                  // onClick={logout}
                  style={{
                    boxShadow: "0px 1px 12px 0px rgba(32, 51, 79, 0.12)",
                    width: "120px",
                    fontSize: "14px",
                  }}
                >
                  Написать
                </BlueButton>
                <BlueButton
                  onClick={() => {
                    setIsOpenSupport(false);
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

            <ButtonModal
              onClick={() => setIsOpenReview(true)}
              ic_Name="ic_Edit"
            >
              Отзыв
            </ButtonModal>
            <ModalPanel
              ico="ic_Edit"
              icoColor="#6B35F5"
              title={`Оставить отзыв`}
              isOpen={isOpenReview}
              setIsOpen={setIsOpenReview}
            >
              <p
                style={{
                  display: "flex",
                  color: "#8F92A1",
                  fontSize: "10px",
                  fontWeight: "400",
                  textAlign: "center",
                  marginTop: "-14px",
                }}
              >
                Вы помогаете нам стать лучше
              </p>
              <div style={{ display: "flex", gap: "20px" }}>
                <BlueButton
                  // onClick={logout}
                  style={{
                    boxShadow: "0px 1px 12px 0px rgba(32, 51, 79, 0.12)",
                    width: "120px",
                    fontSize: "14px",
                  }}
                >
                  Написать
                </BlueButton>
                <BlueButton
                  onClick={() => {
                    setIsOpenReview(false);
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

            <ButtonModal
              onClick={() => setIsOpenReOrder(true)}
              ic_Name="ic_Arrow-Reload"
            >
              Повтроить
            </ButtonModal>
            <ModalPanel
              ico="ic_Arrow-Reload"
              icoColor="#6B35F5"
              title={`Повторить заказ #${id.substring(id.length - 5)}?`}
              isOpen={isOpenReOrder}
              setIsOpen={setIsOpenReOrder}
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
                Товары будут добавлены в корзину. <br />
                Некоторых позиций может не быть <br />в наличии и они будут
                удалены
              </p>
              <div style={{ display: "flex", gap: "20px" }}>
                <BlueButton
                  // onClick={logout}
                  style={{
                    boxShadow: "0px 1px 12px 0px rgba(32, 51, 79, 0.12)",
                    width: "120px",
                    fontSize: "14px",
                  }}
                >
                  Повтроить
                </BlueButton>
                <BlueButton
                  onClick={() => {
                    setIsOpenReOrder(false);
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
          {info?.products?.map((el, index) => (
            <Product key={`${el._id}-${index}`} el={el} />
          ))}
        </div>
      </div>
    </div>
  );
};

const ButtonModal = (props) => {
  return (
    <button onClick={props.onClick} className={styles.ButtonModal}>
      <i className={props.ic_Name} />
      <span>{props.children}</span>
    </button>
  );
};

const Product = (props) => {
  return (
    <div className={styles.ProductCard}>
      <div className={styles.image}>
        <Image src={props.el.assortment.images.rows[0]?.miniature.downloadHref} width={44} height={44} alt='Фото товара' />
      </div>
      <div className={styles.Text}>
        <p>{props.el.assortment.name}</p>
        <span>
          {props.el.quantity}шт |{" "}
          {props.el.assortment.salePrices[0].value / 100}₽{" "}
        </span>
      </div>
      <span className={styles.Price}>
        {(props.el.assortment.salePrices[0].value / 100) * props.el.quantity}₽
      </span>
    </div>
  );
};

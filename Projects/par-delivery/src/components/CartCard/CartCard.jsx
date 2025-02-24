"use client";
import React, { useContext, useEffect, useRef, useState } from "react";
import styles from "./CartCard.module.css";
import { BlueButtonBig, GoBackButtom } from "../Buttons/Buttons";
import Link from "next/link";
import { CardContext } from "@/context/CardContext";
import { Dialog } from "@headlessui/react";
import {
  motion,
  AnimatePresence,
  useMotionValue,
  useTransform,
} from "framer-motion";
import { CartCardButtonBusket } from "./CartButton";
import { useInView } from "react-intersection-observer";

const CartCard = (props) => {
  const [active, setActive] = useState();
  let [isOpen, setIsOpen] = useState(false);

  const [prod, setProd] = useState();
  const [price, setPrice] = useState(0);
  const { globalCard } = useContext(CardContext);
  const [myLocate, setMyLocate] = useState("/");
  useEffect(() => {
    const locate = window.location.pathname;
    setMyLocate(locate);
  }, []);
  useEffect(() => {
    setPrice(0);
    prod
      ? setPrice(
          prod
            ?.map((el) => el.count * el.price)
            .reduce(function (a, b) {
              return a + b;
            }, 0)
        )
      : setPrice(0);
  }, [prod]);

  useEffect(() => {
    const existingData = localStorage.getItem("cardProdusts");
    setProd(JSON.parse(existingData));
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

  return myLocate != "/card" ? (
    <footer className={styles.Footer}>
      <button onClick={() => setIsOpen(true)} className={styles.ButtonInfo}>
        <i className="ic_Buy"></i>
        <div>
          <p>Доставка 0 ₽ · 30 - 90 мин</p>
          {active === true ? <></> : <sub>Подробные условия</sub>}
        </div>
        <i className="ic_Arrow-Right"></i>
      </button>

      <PopupSwipe footer isOpen={isOpen} setIsOpen={setIsOpen}>
        <PopupHeader Title={"Условия доставки"}>
          <div className={styles.blueContain}>
            <div>
              <i className="ic_Car" />
              <h3>Курьером на автомобиле</h3>
            </div>

            <p>
              Наши курьеры обычно доставляют заказы в течение 30 минут, но
              иногда это может занять больше времени, особенно в периоды пиковой
              загруженности или при большом количестве заказов
            </p>
          </div>
          <p className={styles.infoHeader}>
            Бесплатная доставка по Архангельску
          </p>
        </PopupHeader>
        <div style={{ zIndex: "2" }} className={styles.popupContanInfo}>
          <h3>Детали</h3>
          <h4>Районы бесплатной доставки </h4>
          <p>
            Наши услуги доставки охватывают следующие районы без дополнительной
            платы:
          </p>
          <p>
            Октябрьский р-н, Ломоносовский р-н, Привокзальный р-н, Соломбальский
            р-н, Галушина и Варавино-Фактория.
          </p>
          <p>
            Для тех, кто находится за пределами этих районов, мы также
            предлагаем возможность доставки. Пожалуйста, свяжитесь с нами, чтобы
            узнать о наших условиях и стоимости платной доставки в вашем районе
            или регионе
          </p>
        </div>
        <div className={styles.popupContanInfo}>
          <h3>18+</h3>
          <p>
            Мы придерживаемся строгой политики соблюдения возрастных ограничений
            и законодательства в области никотиносодержащей продукции. Важно
            отметить, что мы не осуществляем доставку никотиносодержащей
            продукции лицам, не достигшим 18 лет.
          </p>
        </div>
      </PopupSwipe>

      {active === true ? (
        <Link href="/card">
          <BlueButtonBig
            style={{
              marginTop: "9px",
              display: "flex",
              justifyContent: "space-between",
            }}
          >
            <span className={styles.buttonSpan}>30 - 90 мин</span>
            <span className={styles.buttonSpan}>Заказать</span>
            <span className={styles.buttonSpan}>
              {prod != undefined
                ? price != 0
                  ? price + " ₽"
                  : "Загрузка..."
                : "Загрузка..."}
            </span>
          </BlueButtonBig>
        </Link>
      ) : (
        <></>
      )}
    </footer>
  ) : (
    <CartCardButtonBusket price={price + "₽"} />
  );
};

export const PopupHeader = (props) => {
  return (
    <div className={styles.popupHeader}>
      <div className={styles.swiper}></div>
      <div className={styles.popupMainHead}>
        {props.back && <GoBackButtom onClick={props.backClick} />}
        <Dialog.Title className={styles.popupHead}>{props.Title}</Dialog.Title>
        {props.back && <GoBackButtom styles={{ opacity: "0" }} />}
      </div>
      {props.children}
    </div>
  );
};

export const PopupSwipe = (props) => {
  const { ref, inView } = useInView({
    rootMargin: "-114px 0px 0px 0px",
    threshold: 1,
  });
  useEffect(() => {
    setDrag(inView);
  }, [inView]);

  const isOpen = props.isOpen;
  const setIsOpen = props.setIsOpen;
  const swipeConfidenceThreshold = 10000;

  const swipePower = (offset, velocity) => {
    return Math.abs(offset) * velocity;
  };

  const y = useMotionValue(0);
  const input = [0, 400];
  const output = ["#0000004d", "#00000020"];
  const backgroundColor = useTransform(y, input, output);
  const [drags, setDrag] = useState(true);
  const onDrag = (e, info) => {
    if (info.offset.y <= 0) {
      y.set(0);
      setDrag(false);
    }
  };

  const onDragEnd = (e, { offset, velocity }) => {
    const swipe = swipePower(offset.y, velocity.y);
    if (swipe > swipeConfidenceThreshold) {
      setIsOpen(false);
    }
  };

  return (
    <Dialog open={isOpen} onClose={() => setIsOpen(false)}>
      <AnimatePresence>
        <motion.div style={{ backgroundColor }} className={styles.bg}>
          <Dialog.Panel style={{ width: "100%" }}>
            <motion.div
              className={styles.popup}
              style={{ y }}
              initial={{ y: 300 }}
              animate={{ y: 1 }}
              dragListener={drags}
              drag="y"
              dragConstraints={{ top: 1, bottom: 0 }}
              transition={{ duration: 0.5 }}
              dragElastic={0.8}
              onDragEnd={onDragEnd}
              onDrag={onDrag}
            >
              <div ref={ref}></div>
              {props.children}
            </motion.div>
            {props.footer && (
              <div className={styles.Footer}>
                <BlueButtonBig
                  style={{ color: "#fff" }}
                  onClick={() => setIsOpen(false)}
                >
                  {props.footerText ? props.footerText : "Вернуться на главную"}
                </BlueButtonBig>
              </div>
            )}
          </Dialog.Panel>
        </motion.div>
      </AnimatePresence>
    </Dialog>
  );
};

export default CartCard;

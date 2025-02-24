"use client";
import React, { useContext, useEffect, useState } from "react";
import styles from "./basket.module.css";
import Bag from "./Bag.svg";
import Image from "next/image";
import { CardContext } from "@/context/CardContext";
import Orderinfo from "../Orderinfo/Orderinfo";
import OrderAdressList from "../OrderAdressList/OrderAdressList";
import OrderPayToggle from "../OrderPayToggle/OrderPayToggle";
import OrderButton from "../OrderTime/OrderButton";
import { CartCardButtonHome } from "../CartCard/CartButton";
import OrderCheckBox from "../OrderCheckBox/OrderCheckBox";
import { Dialog } from "@headlessui/react";
import { BlueButton, BlueButtonBig } from "../Buttons/Buttons";
import CartCard from "../CartCard/CartCard";
import { useSession } from "next-auth/react";
import Link from "next/link";
import { ModalPanel } from "../ModalPanel/ModalPanel";
import { useForm } from "react-hook-form";
import InputMask from 'react-input-mask';

export const placeholderPath = "/images/itemCard/testHolder.png"
const Basket = () => {
  // Время переменные

  const DayWeek = () => {
    let now = new Date();
    return now.getDay() === 0
      ? "Вт"
      : now.getDay() === 1
        ? "Ср"
        : now.getDay() === 2
          ? "Чт"
          : now.getDay() === 3
            ? "Пт"
            : now.getDay() === 4
              ? "Сб"
              : now.getDay() === 5
                ? "Вс"
                : "Пн";
  };

  const timePer = [
    { id: 1, time: "30 - 90 мин" },
    { id: 14, time: "14:00 - 15:00" },
    { id: 15, time: "15:00 - 16:00" },
    { id: 16, time: "16:00 - 17:00" },
    { id: 17, time: "17:00 - 18:00" },
    { id: 18, time: "18:00 - 19:00" },
    { id: 19, time: "19:00 - 20:00" },
    { id: 20, time: "20:00 - 21:00" },
    { id: 21, time: "21:00 - 22:00" },
    { id: 22, time: "22:00 - 23:00" },
  ];
  const now = new Date();
  const nowTime = (now.getUTCHours() + 3) % 24;
  const tomorrow = new Date(now.getTime() + 1000 * 60 * 60 * 24);
  const tomorrowAfter = new Date(now.getTime() + 1000 * 60 * 60 * 24 * 2);
  const dateDayTomorrow = tomorrow.getDate();
  const dateDayAfterTomorrow = tomorrowAfter.getDate();

  const Month = (day) => {
    return day.getMonth() === 0
      ? "января"
      : day.getMonth() === 1
        ? "фераля"
        : day.getMonth() === 2
          ? "марта"
          : day.getMonth() === 3
            ? "апреля"
            : day.getMonth() === 4
              ? "мая"
              : day.getMonth() === 5
                ? "июня"
                : day.getMonth() === 6
                  ? "июля"
                  : day.getMonth() === 7
                    ? "августа"
                    : day.getMonth() === 8
                      ? "сентября"
                      : day.getMonth() === 9
                        ? "октября"
                        : day.getMonth() === 10
                          ? "ноября"
                          : "декабря";
  };

  //

  const [price, setPrice] = useState();
  const [activeAddress, setActiveAddress] = useState(null); // активный адрес покупателя для заказа
  const [activePickup, setActivePickup] = useState(null); // активный адрес самовывоза для заказа
  const [activeTimeId, setActiveTimeId] = useState(0); //id время заказа 0 - сейчас, 14 = 14:00-15:00 114 завтра 14:00-15:00,  и тд
  const [payType, setPayType] = useState(true); //true оплата переводом, false - наличка
  const [cashValue, setCashValue] = useState(0); //Сумма, с которой нужна сдача, если 0, то не нужна
  const { setMyLocate, myLocate, globalCard, typeOrder } =
    useContext(CardContext); //Самовывоз: typeOrder=true, доставка: typeOrder=false

  const [isOpen, setIsOpen] = useState(false); // Открытие коментария к заказу
  const [comment, setComment] = useState(null);

  const [PickupErr, setPickupErr] = useState(false); //Проверка адреса самовывоза
  const [AdressErr, setAdressErr] = useState(false); //Проверка адреса
  const [timeErr, setTimeErr] = useState(false); //Проверка времени

  const [prod, setProd] = useState();

  const session = useSession();
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
  }, [globalCard]);
  return (
    <>
      {myLocate <= 0 && (
        <>
          {!prod || prod == 0
            ? <CardFree />
            : (<CardNoFree prod={prod} setProd={setProd} setMyLocate={setMyLocate} />)}
        </>
      )}
      {myLocate === 1 && (
        <div className={styles.content}>
          <Orderinfo
            Bag={Bag}
            prod={prod}
            price={price}
            setMyLocate={setMyLocate}
          />
          <OrderAdressList
            AdressErr={AdressErr}
            setAdressErr={setAdressErr}
            PickupErr={PickupErr}
            setPickupErr={setPickupErr}
            typeOrder={typeOrder}
            activeAddress={activeAddress}
            setActiveAddress={setActiveAddress}
            activePickup={activePickup}
            setActivePickup={setActivePickup}
          />
          <TimeLine
            tomorrowAfter={tomorrowAfter}
            dateDayAfterTomorrow={dateDayAfterTomorrow}
            DayWeek={DayWeek}
            tomorrow={tomorrow}
            Month={Month}
            dateDayTomorrow={dateDayTomorrow}
            nowTime={nowTime}
            timePer={timePer}
            timeErr={timeErr}
            setTimeErr={setTimeErr}
            active={activeTimeId}
            setActive={setActiveTimeId}
          />
          <OrderPayToggle
            enabled={payType}
            setEnabled={setPayType}
            setCashValue={setCashValue}
          />
          <OrderButton onClick={() => setIsOpen(true)} className="ic_Chat">
            {comment ?? 'Комментарий к заказу'}
          </OrderButton>
          {/* <OrderCheckBox /> */}
          {/*  */}
          <Dialog open={isOpen} onClose={() => setIsOpen(false)}>
            <div className={styles.bg}>
              <Dialog.Panel
                style={{ padding: "10px 14px 14px 14px" }}
                className={styles.panel}
              >
                <div className={styles.popupTitle}>
                  <i className="ic_Chat" />
                  <Dialog.Title
                    style={{
                      fontSize: "14px",
                      fontWeight: 400,
                      lineHeight: "106%",
                      letterSpacing: "-0.84px",
                    }}
                  >
                    Комментарий к заказу
                  </Dialog.Title>
                  <button onClick={() => setIsOpen(false)}>
                    <i className="ic_Arrow-Close-Circle" />
                  </button>
                </div>
                <input
                  onChange={(e) => setComment(e.target.value)}
                  className={styles.popupInput}
                  placeholder="Напишите сюда ваши пожелания к заказу"
                />
                <BlueButtonBig onClick={() => setIsOpen(false)}>
                  Готово
                </BlueButtonBig>
              </Dialog.Panel>
            </div>
          </Dialog>
        </div>
      )}

      {myLocate === 2 && (
        <Finally
        // typeOrder={typeOrder}
        // userName={session.data.user.name}
        // cashValue={cashValue}
        // activeAddress={activeAddress}
        // activePickup={activePickup}
        // activeTimeId={activeTimeId}
        // payType={payType}
        // prod={prod}
        // comment={comment}
        />
      )}
      {prod == 0 ? (
        <CartCardButtonHome
          style={{ zIndex: "1000", position: "fixed", bottom: 0 }}
        />
      ) : (
        <NavButton
          AdressErr={AdressErr}
          setAdressErr={setAdressErr}
          PickupErr={PickupErr}
          setPickupErr={setPickupErr}
          timeErr={timeErr}
          setTimeErr={setTimeErr}
          myLocate={myLocate}
          price={price}
          setMyLocate={setMyLocate}
          session={session}
          timePer={timePer}
          DayWeek={DayWeek}
          dateDayAfterTomorrow={dateDayAfterTomorrow}
          Month={Month}
          tomorrowAfter={tomorrowAfter}
          // Заказ
          typeOrder={typeOrder}
          userName={session.data?.user.name}
          cashValue={cashValue}
          activeAddress={activeAddress}
          activePickup={activePickup}
          activeTimeId={activeTimeId}
          payType={payType}
          prod={prod}
          comment={comment}
        />
      )}
    </>
  );
};

export const CartCardButtonOrderHome = (props) => {
  return (
    <footer style={props.style} className={styles.Footer}>
      <Link className={styles.finalButtonHead} href="/order">
        <i className="ic_Paper" />
        <span>Перейти к заказу</span>
        <i className="ic_Arrow-Right" />
      </Link>
      <Link href="/">
        <BlueButtonBig>На главную</BlueButtonBig>
      </Link>
    </footer>
  );
};

const NavButton = (props) => {
  const [phones, setPhones] = useState();
  const session = useSession();
  const userId = session?.data?.user?.id;
  const getPhones = () => {
    var requestOptions = {
      method: "GET",
    };

    fetch(`/api/phones?userid=${userId}`, requestOptions)
      .then((response) => response.json())
      .then((result) => setPhones(result.phones.length))
      .catch(() => setPhones(null));
  };

  useEffect(getPhones, [userId])

  const postOrder = () => {
    const card = {
      typeOrder: props.typeOrder,
      userName: props.userName,
      cashValue: props.cashValue,
      activeAddress: props.activeAddress,
      activePickup: props.activePickup,
      activeTimeId: props.activeTimeId,
      payType: props.payType,
      prod: props.prod,
      comment: props.comment,
    };

    const myHeaders = new Headers();
    myHeaders.append("Content-Type", "application/json");

    const raw = JSON.stringify(card);

    const requestOptions = {
      method: "POST",
      headers: myHeaders,
      body: raw,
      redirect: "follow",
    };

    fetch("/api/orders", requestOptions)
      .then((response) => response.text())
      .then((result) => console.log('basket', result))
      .catch((error) => console.log("error", error));
  };

  const minPrice = 800;
  const [isOpen, setIsOpen] = useState(false);
  const [isOpenPhone, setIsOpenPhone] = useState(false);

  const [phone, setPhone] = useState('');
  const PostPhone = () => {
    const raw = JSON.stringify({
      userid: props.session.data?.user.id,
      phone: phone,
    });
    const requestOptions = {
      method: "POST",
      body: raw,
    };
    if (phone != null) {
      fetch(`/api/phones`, requestOptions)
        .then((response) => response.json())
        .then(() => {
          getPhones(props.session?.data?.user?.id);
        })
        .catch((err) => console.error(err));
      setPhone(null);
      setIsOpenPhone(false);
    }
  };
  const nextLocation = () => {
    if (props.myLocate <= 1) {
      props.setMyLocate(1);
    }
    if (props.myLocate === 1) {
      if (props.typeOrder == false) {
        if (
          props.activeAddress == null ||
          props.activeTimeId == 0 ||
          phones == 0
        ) {
          if (props.activeAddress == null) {
            props.setAdressErr(true);
          }
          if (props.activeTimeId == 0) {
            props.setTimeErr(true);
          }
          if (phones == 0) {
            setIsOpenPhone(true);
          }
        } else {
          postOrder();
          props.setMyLocate(2);
        }
      } else {
        if (
          props.activePickup == null ||
          props.activeTimeId == 0 ||
          phones == 0
        ) {
          if (props.activePickup == null) {
            props.setPickupErr(true);
          }
          if (props.activeTimeId == 0) {
            props.setTimeErr(true);
          }
          if (phones == 0) {
            setIsOpenPhone(true);
          }
        } else {
          postOrder();
          props.setMyLocate(2);
        }
      }
    }
  };

  const {
    handleSubmit,
    register,
    formState: { errors },
  } = useForm({ mode: "onChange" });
  const onSubmit = (data) => console.log('basket', data);

  return props.myLocate > 1 ? (
    <CartCardButtonOrderHome
      style={{ zIndex: "1000", position: "fixed", bottom: 0 }}
    />
  ) : (
    <>
      <div
        style={{ zIndex: "10", marginLeft: "0px" }}
        className={`${styles.popupMainButtonContain} ${styles.panel}`}
      >
        <div className={styles.titleButtomPopup}>
          <h3 style={{ fontSize: "24px", letterSpacing: "-0.96px" }}>
            {props.price}₽
          </h3>
          <h4
            style={{
              color: "#8F92A1",
              fontSize: "10px",
              fontWeight: 400,
              lineHeight: "120%",
              letterSpacing: "-0.65px",
            }}
          >
            {props.activeTimeId >= 200
              ? `${props.DayWeek()}, ${props.dateDayAfterTomorrow
              } ${props.Month(props.tomorrowAfter)}`
              : props.activeTimeId >= 100
                ? "Завтра"
                : ""}
          </h4>
          <span>
            {props.timePer.find((el) => el.id === props.activeTimeId % 100)
              ? props.timePer.find((el) => el.id === props.activeTimeId % 100)
                .time
              : "от 30 - 90 мин"}
          </span>
        </div>
        <BlueButtonBig
          disabled={props.price < minPrice ? true : false}
          className={
            props.price < minPrice
              ? `BlueButton BlueButton2 ${styles.unactive}`
              : `BlueButton BlueButton2`
          }
          onClick={
            props.session.status != "authenticated"
              ? () => setIsOpen(true)
              : nextLocation
          }
        >
          {props.price < minPrice
            ? `Добавьте ещё на ${minPrice - props.price}₽`
            : `Верно, ${props.myLocate === 0 ? "продолжить" : "заказать"}`}
        </BlueButtonBig>
      </div>

      <ModalPanel
        ico="ic_Profile"
        icoColor="#6B35F5"
        title={"Войдите в аккаунт"}
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
          Чтобы продолжить, вам необходимо <br />
          войти или создать аккаунт
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
      <Dialog
        open={isOpenPhone}
        onClose={() => {
          setIsOpenPhone(false), setPhone(null);
        }}
      >
        <div className={styles.bg}>
          <Dialog.Panel
            style={{ padding: "10px 14px 14px 14px" }}
            className={styles.panel}
          >
            <div className={styles.popupTitle}>
              <i className="ic_Call" />
              <Dialog.Title
                style={{
                  fontSize: "14px",
                  fontWeight: 400,
                  lineHeight: "106%",
                  letterSpacing: "-0.84px",
                }}
              >
                Укажите номер телефона для заказа
              </Dialog.Title>
              <button
                onClick={() => {
                  setIsOpenPhone(false), setPhone(null);
                }}
              >
                <i className="ic_Arrow-Close-Circle" />
              </button>
            </div>
            <form className="form" onSubmit={handleSubmit(onSubmit)}>
              <InputMask
                mask="+7 (999) 999 99 99"
                placeholder="+7 (000) 000 00 00"
                value={phone}
                onChange={(e) => setPhone(e.target.value)}
                className={`${styles.popupInput} ${errors.phone && styles.error
                  }`}
              >
                {(inputProps) => <input {...inputProps} type="tel" />}
              </InputMask>
              {errors.phone && <span>Введите коректный номер телефона</span>}
            </form>
            <BlueButtonBig onClick={() => PostPhone()}>Готово</BlueButtonBig>
          </Dialog.Panel>
        </div>
      </Dialog>
    </>
  );
};

const TimeLine = ({
  active,
  setActive,
  timeErr,
  setTimeErr,
  timePer,
  nowTime,
  dateDayTomorrow,
  tomorrow,
  tomorrowAfter,
  dateDayAfterTomorrow,
  DayWeek,
  Month,
}) => {
  const [openModal, setOpenModal] = useState(false);
  const [defaultDay, setDefaultDay] = useState(100);
  useEffect(() => {
    // console.log('timeline', active);
  }, [active]);

  return (
    <>
      <div className={styles.TimeLine}>
        {timeErr === true ? (
          <h6 style={{ color: "#2b2b2b" }}>Время доставки:</h6>
        ) : (
          <h6>Время доставки:</h6>
        )}
        <div className={styles.SwapeLine}>
          {timePer.map((el) =>
            nowTime < el.id ? (
              <button
                key={`${el.id}${el.time}`}
                onClick={() => {
                  setActive(el.id), setTimeErr(false);
                }}
                className={`${active == el.id && styles.active} ${styles.TimePanel
                  } ${timeErr === true && styles.err}`}
              >
                {el.time}
              </button>
            ) : (
              nowTime > 13 &&
              nowTime < 22 &&
              el.id == 1 && (
                <button
                  key={`${el.id}${el.time}`}
                  onClick={() => {
                    setActive(el.id), setTimeErr(false);
                  }}
                  className={`${active == el.id && styles.active} ${styles.TimePanel
                    } ${timeErr === true && styles.err}`}
                >
                  Через ~{el.time}
                </button>
              )
            )
          )}
          <button
            onClick={() => {
              setOpenModal(true), setTimeErr(false);
            }}
            className={`${active > 100 && styles.active} ${styles.TimePanel} ${timeErr === true && styles.err
              }`}
          >
            Другое время
          </button>
        </div>
      </div>

      <Dialog
        open={openModal}
        onClose={(e) => {
          setOpenModal(false);
        }}
      >
        <Dialog.Panel
          onClick={() => {
            setOpenModal(false);
          }}
          className={styles.bg}
        >
          <Dialog.Panel className={styles.panel}>
            <div className={styles.swiper}></div>
            <div className={styles.headGroup}>
              <button
                onClick={() => setActive(0)}
                className={styles.cancelButton}
              >
                Сбросить
              </button>
              <Dialog.Title className={styles.popupHead}>
                Время доставки
              </Dialog.Title>
              <button
                onClick={() => setOpenModal(false)}
                className={styles.closeButton}
              >
                <i className="ic_Arrow-Close-Circle" />
              </button>
            </div>
            <div className={styles.dayLine}>
              <button
                onClick={() => setDefaultDay(100)}
                className={defaultDay == 100 && styles.active}
              >
                Завтра, {dateDayTomorrow} {Month(tomorrow)}
              </button>
              <button
                onClick={() => setDefaultDay(200)}
                className={defaultDay == 200 && styles.active}
              >
                {DayWeek()}, {dateDayAfterTomorrow} {Month(tomorrowAfter)}
              </button>
            </div>
            <div className={styles.popupMain}>
              <p className={styles.popupMainText}>
                Выберите, когда вам
                <br /> удобно получить заказ:
              </p>
              {timePer.map(
                (el) =>
                  el.id != 1 && (
                    <button
                      key={el.id}
                      onClick={() => setActive(el.id + defaultDay)}
                      className={styles.timeButton}
                    >
                      <span
                        className={
                          active == defaultDay + el.id && styles.active
                        }
                      >
                        {el.time}
                      </span>
                      {active == defaultDay + el.id && (
                        <i className="ic_Tick-Square" />
                      )}
                    </button>
                  )
              )}
            </div>
            <div className={`${styles.popupMainButtonContain} ${styles.panel} ${styles.popupMainButtonContainTime}`}>
              <div className={styles.titleButtomPopup}>
                <h4>
                  {active >= 200
                    ? `${DayWeek()}, ${dateDayAfterTomorrow} ${Month(
                      tomorrowAfter
                    )}`
                    : active >= 100
                      ? "Завтра"
                      : active > 0
                        ? "Сегодня"
                        : "Выберите"}
                </h4>
                <span>
                  {timePer.find((el) => el.id === active % 100)
                    ? timePer.find((el) => el.id === active % 100).time
                    : "Время доставки"}
                </span>
              </div>
              <BlueButtonBig onClick={() => setOpenModal(false)}>
                Продолжить
              </BlueButtonBig>
            </div>
          </Dialog.Panel>
        </Dialog.Panel>
      </Dialog>
    </>
  );
};

const Finally = (card) => {
  useEffect(() => {
    localStorage.removeItem("cardProdusts");
  }, []);
  return (
    <div className={`${styles.content} ${styles.finally}`}>
      <i className="ic_Tick-Square" />
      <h3>Ваш заказ принят!</h3>
      <p>
        Мы уже начали собирать ваш заказ,
        <br />
        Для уточнения данных с вами может связаться наш курьер
      </p>
    </div>
  );
};

export const CardFree = () => {
  return (
    <div
      style={{
        zIndex: 1,
        justifyContent: "center",
        position: "fixed",
        top: 0,
        bottom: 0,
        marginTop: 0,
      }}
      className={styles.content}
    >
      <Image priority src={Bag} alt="" />
      <h3>В корзине пока ничего нет</h3>
      <p>Но ты можешь это исправить</p>
    </div>
  );
};

const CardNoFree = ({ setMyLocate, prod, setProd }) => {
  const [update, setUpdate] = useState(0);

  useEffect(() => {
    const a = JSON.parse(localStorage.getItem("cardProdusts"));
    setProd(a);
  }, [, update]);
  useEffect(() => {
    prod != "" && prod != null ? setMyLocate(0) : setMyLocate(-1);
  }, [prod]);

  return prod != "" && prod != null ? (
    <div
      style={{ zIndex: 2, paddingBottom: "100px" }}
      className={styles.content}
    >
      {prod.map((el) => (
        <CardProductsBasket
          setUpdate={setUpdate}
          key={el.id}
          count={el.count}
          id={el.id}
          name={el.name}
          price={el.price}
          miniature={el.miniature}
          stock={el.stock}
        />
      ))}
    </div>
  ) : (
    <></>
  );
};
const CardProductsBasket = (props) => {
  const { pushCard } = useContext(CardContext);
  const key = "cardProdusts";
  const [count, setCount] = useState(props.count);

  const clickButtonMinus = () => {
    try {
      setCount(count - 1);
      const existingData = localStorage.getItem(key);
      let data = existingData ? JSON.parse(existingData) : [];

      for (let i = 0; i < data.length; i++) {
        if (data[i].id === props.id) {
          if (count - 1 === 0) {
            data.splice(i, 1);
            props.setUpdate((update) => update + 1);
          } else {
            data[i].count = count - 1;
          }
          break;
        }
      }
      localStorage.setItem(key, JSON.stringify(data));
    } finally {
      pushCard();
    }
  };
  const clickButtonPlus = () => {
    try {
      if (count < props.stock) {
        setCount(count + 1);
      }
      const existingData = localStorage.getItem(key);
      let data = existingData ? JSON.parse(existingData) : [];

      for (let i = 0; i < data.length; i++) {
        if (data[i].id === props.id && count < props.stock) {
          data[i].count = count + 1;
          break;
        }
      }
      localStorage.setItem(key, JSON.stringify(data));
    } finally {
      pushCard();
    }
  };

  return (
    <div className={styles.CardProductsBasket}>
      <Image
        width={84}
        height={104}
        priority
        src={props.miniature != "#" ? props.miniature : placeholderPath}
        alt=""
      />
      <div className={styles.MainContainCardProductsBasket}>
        <p>
          {props.name
            .replace(["Электронный испаритель"], "")
            .replace("(м)", "")
            .replace("(н)", "")
            .replace("М.", "")
            .replace("M.", "")
            .replace("Табак для кальяна", "")}
        </p>
        <div className={styles.FunctionalCardComp}>
          <div>
            <span className={styles.CartPrice}>{count * props.price}₽</span>
            <span className={styles.CartCount}>
              {count}шт | {props.price}₽
            </span>
          </div>
          <div className={styles.CartCountButton}>
            <button onClick={clickButtonMinus}>
              {count == 1 ? (
                <i style={{ color: '#fff' }} className={`ic_Delete ${styles.deleteButton}`} />
              ) : (
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="13"
                  height="3"
                  viewBox="0 0 13 3"
                  fill="none"
                >
                  <path
                    d="M11.5 1.5H1.5"
                    stroke="#2B2B2B"
                    strokeWidth="2"
                    strokeLinecap="round"
                  />
                </svg>
              )}
            </button>
            <span>{count}</span>
            <button onClick={clickButtonPlus}>
              <i className="ic_Plus" />
            </button>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Basket;

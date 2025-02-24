import { CardButtonBig, CardMultiButtonBig } from "../Buttons/Buttons";
import Image from "next/image";
import style from "./ProductsGrid.module.css";
import { useContext, useEffect, useState } from "react";
import { CardContext } from "@/context/CardContext";
import { useInView } from "react-intersection-observer";

function ProductsCard(props) {
  const [numButton, setNumButton] = useState(0);
  const [like, setLike] = useState(false);
  const key = "cardProdusts";
  const { pushCard } = useContext(CardContext);

  const { ref, inView } = useInView({
    triggerOnce: true,
    rootMargin: "600px",
  });
  useEffect(() => {
    const existingData = localStorage.getItem(key);
    let data = existingData ? JSON.parse(existingData) : [];
    for (let i = 0; i < data.length; i++) {
      if (data[i].id === props.id) {
        setNumButton(data[i].count);
        break;
      }
    }

    const existingDataLike = localStorage.getItem("like");
    let like = existingDataLike ? JSON.parse(existingDataLike) : [];
    for (let i = 0; i < like.length; i++) {
      if (like[i] === props.id) {
        setLike(true);
        break;
      }
    }
  }, [inView, props.id]);
  const clickAddLike = () => {
    setLike(true);
    const value = props.id;
    const existingData = localStorage.getItem("like");
    let data = existingData ? JSON.parse(existingData) : [];
    data.push(value);
    localStorage.setItem("like", JSON.stringify(data));
  };

  const clickDelLike = () => {
    setLike(false);
    const existingData = localStorage.getItem("like");
    let data = existingData ? JSON.parse(existingData) : [];
    for (let i = 0; i < data.length; i++) {
      if (data[i] === props.id) {
        data.splice(i, 1);
        break;
      }
    }
    localStorage.setItem("like", JSON.stringify(data));
  };

  const clickButtonFirst = () => {
    try {
      setNumButton(1);
      const value = {
        id: props.id,
        count: 1,
        miniature: props.miniature,
        price: props.price,
        name: props.name
          .replace(["Электронный испаритель"], "")
          .replace("(м)", "")
          .replace("(н)", "")
          .replace("М.", "")
          .replace("M.", "")
          .replace("Табак для кальяна", ""),
        stock: props.stock,
      };
      const existingData = localStorage.getItem(key);
      let data = existingData ? JSON.parse(existingData) : [];
      data.push(value);
      localStorage.setItem(key, JSON.stringify(data));
    } finally {
      pushCard();
    }
  };
  const clickButtonMinus = () => {
    try {
      setNumButton(numButton - 1);
      const existingData = localStorage.getItem(key);
      let data = existingData ? JSON.parse(existingData) : [];

      for (let i = 0; i < data.length; i++) {
        if (data[i].id === props.id) {
          if (numButton - 1 === 0) {
            data.splice(i, 1);
          } else {
            data[i].count = numButton - 1;
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
      if (numButton < props.stock) {
        setNumButton(numButton + 1);
      }
      const existingData = localStorage.getItem(key);
      let data = existingData ? JSON.parse(existingData) : [];

      for (let i = 0; i < data.length; i++) {
        if (data[i].id === props.id && numButton < props.stock) {
          data[i].count = numButton + 1;
          break;
        }
      }
      localStorage.setItem(key, JSON.stringify(data));
    } finally {
      pushCard();
    }
  };
  const imgSrc = `https://pardelivery.hb.ru-msk.vkcloud-storage.ru${props.img}`;
  return (
    <div
      ref={props.refs}
      className={style.ProductsCard}
      onClick={props.onClick}
    >
    {/* <img alt='' src={props.img != "" ? imgSrc : "/images/itemCard/testHolder.png"} /> */}
      <Image
        priority={props.priority}
        ref={ref}
        style={{ background: "#FFF" }}
        alt=""
        quality={100}
        src={props.img != "" ? imgSrc : "/images/itemCard/testHolder.png"}
        width={168}
        height={194}
      />
      {/* {props.stockDays && console.log(new Date()-new Date(props.stockDays))} */}
      {props.stockDays &&(new Date()-new Date(props.stockDays)) < 804300639 && <div className={style.StickerNew}>новинка</div>}

      <div className={style.ProductPrice}>
        <div>
          <h4 style={{ textAlign: "left" }}>{props.price}₽</h4>
          <span>
            {props.stock > 4
              ? "много"
              : props.stock > 1
              ? "достаточно"
              : "заканчивается"}
          </span>
        </div>
        {like === false ? (
          <button onClick={clickAddLike}>
            <i className="ic_Heart" />
          </button>
        ) : (
          <button onClick={clickDelLike}>
            <i className="ic_Full-Heard" />
          </button>
        )}
      </div>
      <p>
        {props.name
          .replace(["Электронный испаритель"], "")
          .replace("(м)", "")
          .replace("(н)", "")
          .replace("М.", "")
          .replace("M.", "")
          .replace("Табак для кальяна", "")}
      </p>
      <div className={style.ButtonContain}>
        {numButton == 0 ? (
          <CardButtonBig onClick={clickButtonFirst}>
            <i className="ic_Plus" />
            <span>Добавить</span>
          </CardButtonBig>
        ) : (
          <CardMultiButtonBig style={{ background: "#6B35F5" }}>
            <button className={style.mathButton} onClick={clickButtonMinus}>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="13"
                height="3"
                viewBox="0 0 13 3"
                fill="none"
              >
                <path
                  d="M11.5 1.5H1.5"
                  stroke="white"
                  strokeWidth="2"
                  strokeLinecap="round"
                />
              </svg>
            </button>
            <span>{numButton}</span>
            <button className={style.mathButton} onClick={clickButtonPlus}>
              <i
                style={
                  numButton === props.stock
                    ? { color: "#6B35F5" }
                    : { color: "#fff" }
                }
                className="ic_Plus"
              />
            </button>
          </CardMultiButtonBig>
        )}
      </div>
    </div>
  );
}

export default ProductsCard;

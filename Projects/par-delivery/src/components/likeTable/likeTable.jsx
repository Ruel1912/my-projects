"use client";
import React, { useEffect, useState } from "react";
import ProductsCard from "../ProductsGrid/ProductsCard";
import style from "./likeTable.module.css";
const LikeTable = () => {
  const [prod, setProd] = useState();

  useEffect(() => {
    setProd(JSON.parse(localStorage.getItem("like")));
  }, []);

  return prod != null ? (
    <div className={style.ProductsGrid}>
      {prod.map((el, index) => (
        <ParseOneProd key={el} index={index} el={el} />
      ))}
    </div>
  ) : (
    <></>
  );
};

const ParseOneProd = (props) => {
  const [prod, setProd] = useState();
  useEffect(() => {
    fetch(`/api/products?id=${props.el}`)
      .then((res) => res.json())
      .then((res) => setProd(res.data.rows[0]));
  }, []);

  return prod != undefined ? (
    <>
      <ProductsCard
        priority={
          props.index === prod.length - 10 ||
          props.index === prod.length - 9 ||
          props.index === prod.length - 8 ||
          props.index === prod.length - 7
            ? true
            : false
        }
        refs={props.index === prod.length - 4 ? null : null}
        id={prod.id}
        key={prod.id}
        name={prod.name}
        stock={prod.stock}
        price={prod.salePrices && prod.salePrices[0].value / 100}
        img={prod.images?.meta.size == 1 && `/${prod.pathName}/${prod.id}.png`}
        miniature={
          prod.images?.meta.size == 1
            ? prod.images.rows[0].miniature?.downloadHref
            : "#"
        }
        stockDays={prod.createTime && prod.createTime}
      />
    </>
  ) : (
    <></>
  );
};

export default LikeTable;

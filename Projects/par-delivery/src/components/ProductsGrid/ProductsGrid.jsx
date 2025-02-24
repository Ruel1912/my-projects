"use client";
import React, { useContext, useEffect, useRef, useState } from "react";
import style from "./ProductsGrid.module.css";
import ProductsCard from "./ProductsCard";
import { useInView } from "react-intersection-observer";
import { CardContext } from "@/context/CardContext";
import ProductsCardSkeleton from './ProductsCardSkeleton';

function ProductsGrid(props) {
  const { sortValue } = useContext(CardContext);
  const [prod, setProd] = useState([]);
  const [offset, setOffset] = useState(10);
  const [loading, setLoading] = useState(true);

  const { ref, inView } = useInView({
    threshold: 0,
  });

  useEffect(() => {
    const fetchData = async () => {
      setLoading(true);
      try {
        const response = await fetch(`/api/products?tab=${props.activeLink}&offset=0&sort=${sortValue}`);
        const res = await response.json();
        setProd(res?.data?.rows || []);
      } catch (error) {
        console.error("Error fetching products:", error);
      } finally {
        setOffset(10);
        setLoading(false);
      }
    };

    fetchData();
  }, [props.activeLink, sortValue]);

  useEffect(() => {
    if (props.activePath !== undefined) {
      const fetchData = async () => {
        setLoading(true);
        try {
          const response = await fetch(`/api/products?path=${props.activePath}&offset=0&sort=${sortValue}`);
          const res = await response.json();
          setProd(res?.data?.rows || []);
        } catch (error) {
          console.error("Error fetching products:", error);
        } finally {
          setOffset(10);
          setLoading(false);
        }
      };

      fetchData();
    }
  }, [props.activePath, sortValue]);

  useEffect(() => {
    if (inView) {
      const fetchMoreData = async () => {
        setLoading(true);
        try {
          const response = await fetch(
            props.activePath !== undefined
              ? `/api/products?path=${props.activePath}&offset=${offset}&sort=${sortValue}`
              : `/api/products?tab=${props.activeLink}&offset=${offset}&sort=${sortValue}`
          );
          const res = await response.json();
          setProd((prevProd) => [...prevProd, ...(res?.data?.rows || [])]);
          setOffset((prevOffset) => prevOffset + 10);
        } catch (error) {
          console.error("Error fetching more products:", error);
        } finally {
          setLoading(false);
        }
      };

      fetchMoreData();
    }
  }, [inView]);

  if (loading && prod?.length === 0) {
    return (
      <div className={style.ProductsGrid}>
        {Array.from({ length: 30 }, (_, key) => (
          <ProductsCardSkeleton key={key} />
        ))}
      </div>
    );
  }

  return prod.length > 0 ? (
    <div className={style.ProductsGrid}>
      {prod.map((products, index) => (
        <ProductsCard
          priority={
            index >= prod.length - 4 // Устанавливаем приоритет для последних 4 карточек
          }
          refs={index === prod.length - 4 ? ref : null}
          id={products.id}
          key={index}
          name={products.name}
          price={products.salePrices && products.salePrices[0].value / 100}
          img={
            products.images?.meta.size === 1 &&
            `/${products.pathName}/${products.id}.png`
          }
          stock={products.stock}
          stockDays={products.createTime && products.createTime}
          miniature={
            products.images?.meta.size === 1
              ? products.images.rows[0].miniature?.downloadHref
              : "#"
          }
        />
      ))}
    </div>
  ) : (
    <div style={{ textAlign: "center", height: "100%", display: "flex", marginTop: "100px", justifyContent: "center" }}>
      <h1>Товаров не найдено</h1>
    </div>
  );
}

export default ProductsGrid;
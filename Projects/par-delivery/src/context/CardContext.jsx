"use client";
import { createContext, useEffect, useState } from "react";

export const CardContext = createContext();

export const CardProvider = ({ children }) => {
  const [typeOrder, setTypeOrder] = useState(false);
  const [globalCard, setGlobalCard] = useState(0);
  const [myLocate, setMyLocate] = useState(0);
  const [sortValue, setSortValue] = useState("По умолчанию");
  useEffect(() => {
    const locate = window.location.pathname;
    if (locate != "/card") {
      setMyLocate(0);
    }
  }, []);

  const key = "cardProdusts";
  const pushCard = () => {
    setGlobalCard(globalCard + 1);
  };
  return (
    <CardContext.Provider
      value={{
        pushCard,
        globalCard,
        myLocate,
        setMyLocate,
        sortValue,
        setSortValue,
        typeOrder,
        setTypeOrder,
      }}
    >
      {children}
    </CardContext.Provider>
  );
};

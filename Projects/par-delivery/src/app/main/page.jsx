"use client"
import React, { useEffect, useState } from "react";
import LayoutMain from "@/components/layoutMain/LayoutMain";
import Banner from "@/components/Banner/Banner";
import ProductsLayout from "@/components/ProductsLayout/ProductsLayout";
import Header from "@/components/header/header";
import { HeaderLeftNav } from "@/components/header/HeaderSidebarBtn"
import CartCard from "@/components/CartCard/CartCard";
import { SideBarProvider } from "@/context/SideBarContext";
import Loader from '@/components/Loader/loading';
import { ModalPanel } from '@/components/ModalPanel/ModalPanel';
import { BlueButton } from '@/components/Buttons/Buttons';

const Main = () => {
  const [showLoader, setShowLoader] = useState(true);
  const [isOpenAdult, setIsOpenAdult] = useState(false);
  const [isOpenAdultNO, setIsOpenAdultNO] = useState(false);

  const checkAge = () => {
    if (typeof window !== 'undefined') {
      localStorage.setItem('adult', 'true');
      setIsOpenAdult(false);
    }
  };

  useEffect(() => {
    if (typeof window !== "undefined") {
      const adult = localStorage.getItem("adult");
      if (!adult) {
        setIsOpenAdult(true);
      }

      const timeoutId = setTimeout(() => {
        setShowLoader(false); 
      }, 1000);

      return () => {
        clearTimeout(timeoutId);
      };
    }
  }, []);

  if (showLoader) {
    return <Loader />;
  }

  return (
    <SideBarProvider>
      <ModalPanel
        ico="ic_Danger-Triangle"
        icoColor="#2b2b2b"
        title={"Вам исполнилось 18 лет?"}
        isOpen={isOpenAdult}
        setIsOpen={setIsOpenAdult}
        backdropStyle={{ pointerEvents: "none", userSelect: "none" }}
        backdropClick={(e) => e.stopPropagation()}
      >
        <div style={{ display: "flex", gap: "20px" }}>
          <BlueButton
            onClick={() => {
              setIsOpenAdult(!isOpenAdult);
              setIsOpenAdultNO(!isOpenAdultNO);
            }}
            style={{
              background: "#E1E6F7",
              color: "#6B35F5",
              boxShadow: "0px 1px 12px 0px rgba(32, 51, 79, 0.12)",
              width: "120px",
              fontSize: "14px",
            }}
          >
            Нет
          </BlueButton>
          <BlueButton
            onClick={checkAge}
            style={{
              boxShadow: "0px 1px 12px 0px rgba(32, 51, 79, 0.12)",
              width: "120px",
              fontSize: "14px",
            }}
          >
            Да
          </BlueButton>
        </div>
      </ModalPanel>
      <ModalPanel
        ico="ic_Danger-Triangle"
        icoColor="#2b2b2b"
        title={"Доступ запрещён"}
        isOpen={isOpenAdultNO}
        setIsOpen={setIsOpenAdultNO}
        backdropStyle={{ pointerEvents: "none", userSelect: "none" }}
        backdropClick={(e) => e.stopPropagation()}
      >
      </ModalPanel>
      <HeaderLeftNav />
      <LayoutMain>
        <Header />
        <Banner />
        <ProductsLayout />
        <CartCard />
      </LayoutMain>
    </SideBarProvider>
  );
};

export default Main;

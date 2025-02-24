import React from "react";
import LayoutMain from "@/components/layoutMain/LayoutMain";
import styles from "./page.module.css";

import { HeaderTwo } from "@/components/header/header";
import { SideBarProvider } from "@/context/SideBarContext";
import { CartCardButtonHome } from "@/components/CartCard/CartButton";

import { OrderContent } from "@/components/OrderContent/OrderContent";
import { HeaderLeftNav } from "@/components/header/HeaderSidebarBtn";

const Order = () => {
  return (
    <main className={styles.main}>
      <SideBarProvider>
        <HeaderLeftNav />
        <LayoutMain>
          <HeaderTwo>
            <span style={{ display: "flex" }}>История заказов:</span>
          </HeaderTwo>
          <div className={styles.content}>
            <h2>История заказов:</h2>
            <OrderContent />
          </div>
          <CartCardButtonHome />
        </LayoutMain>
      </SideBarProvider>
    </main>
  );
};

export default Order;

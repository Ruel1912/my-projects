import React from "react";
import LayoutCard from "@/components/layoutCard/layoutCard";
import LayoutMain from "@/components/layoutMain/LayoutMain";
import styles from "./page.module.css";
import { SideBarProvider } from "@/context/SideBarContext";
import Basket from "@/components/Basket/basket";
import { HeaderLeftNav } from "@/components/header/HeaderSidebarBtn";
const Card = () => {
  return (
    <SideBarProvider>
      <HeaderLeftNav />
      <LayoutMain>
        <main className={styles.main}>
          <LayoutCard>
            <Basket />
          </LayoutCard>
        </main>
      </LayoutMain>
    </SideBarProvider>
  );
};

export default Card;

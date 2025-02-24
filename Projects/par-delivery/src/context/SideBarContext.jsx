"use client";

import { SessionProvider } from "next-auth/react";

import { animateScroll as scroll } from "react-scroll";

import { createContext, useState } from "react";
import scrollLock from "scroll-lock";
import { CardProvider } from "./CardContext";

export const SideBarContext = createContext();

export const SideBarProvider = ({ children }) => {
  const [activeNav, setAcvtiveNav] = useState(false);
  const [position, setPosition] = useState();
  const swapStateNav = () => {
    // setAcvtiveNav((prev) === false ? true : false)

    if (activeNav === false) {
      setPosition(document.getElementById("root").scrollTop);
      setAcvtiveNav(true);
      scrollLock.disablePageScroll();
      // console.log(document.getElementById('gay').scrollTop)
    } else {
      setAcvtiveNav(false);
      scrollLock.enablePageScroll();
      scroll.scrollTo(position);
      // console.log("Позиция:", position);
    }
  };
  return (
    <SessionProvider>
      <SideBarContext.Provider value={{ swapStateNav, activeNav }}>
        <CardProvider>
          <div
            className={activeNav === true ? "LayoutContan" : "LayoutContan2"}
          >
            {children}
          </div>
        </CardProvider>
      </SideBarContext.Provider>
    </SessionProvider>
  );
};

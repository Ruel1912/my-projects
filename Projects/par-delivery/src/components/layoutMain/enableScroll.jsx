"use client";
import { SideBarContext } from "@/context/SideBarContext";
import { useContext, useEffect } from "react";
import scrollLock from "scroll-lock";
const EnableScroll = () => {
  const { swapStateNav, activeNav } = useContext(SideBarContext);
  useEffect(() => {
    if (activeNav === true) {
      swapStateNav();
    } else scrollLock.enablePageScroll();
  }, []);
};

export default EnableScroll;

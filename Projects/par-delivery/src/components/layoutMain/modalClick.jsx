"use client"
import { SideBarContext } from "@/context/SideBarContext";
import { useContext } from "react";

export const ModalClick = () => {
    const { swapStateNav } = useContext(SideBarContext);
  return (
    <div onClick={swapStateNav} className="ModalClick"></div>
  )
}

"use client";
import "./LayoutMain.css";
import Image from "next/image";
import logo from "./logoWhiteText.svg";
import cat from "./profileIco.svg";
import { HeaderSidebarBtn } from "../header/HeaderSidebarBtn";
import EnableScroll from "./enableScroll";
import { ModalClick } from "./modalClick";
import { NavButton } from "./NavButton";
import { useSession } from "next-auth/react";

let LayoutMain = ({ children }) => {
  return (
    <>
      <EnableScroll />
      {/* <div onClick={swapStateNav} className="LayoutMainContan"> */}
      <div className="LayoutMainContan" id="gay">
        <ModalClick />
        {children}
      </div>
    </>
  );
};



export default LayoutMain;

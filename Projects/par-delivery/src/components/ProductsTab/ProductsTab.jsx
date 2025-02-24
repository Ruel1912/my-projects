"use client";
import React, { useContext, useEffect, useState } from "react";
import style from "./ProductsTab.module.css";
import { useInView } from "react-intersection-observer";
import ScrollUp from "../ScrollUp/ScrollUp";
import { SideBarContext } from "@/context/SideBarContext";
const ProductsTab = (props) => {
  const TabList = props.TabList;
  const activeLowTab = props.activeLowTab;
  const setActiveLowTab = props.setActiveLowTab;
  const activeLink = props.activeLink;
  const setActiveLink = props.setActiveLink;

  const { activeNav } = useContext(SideBarContext);

  const [active, setActive] = useState(true);
  const [roots, setRoots] = useState("-40px 0px 0px 0px");
  const [thresholds, setThresholds] = useState(1);

  useEffect(() => {
    if (activeNav === true) {
      setRoots("-190px 0px 0px 0px");
      setThresholds(0.2);
    } else {
      setRoots("-150px 0px 0px 0px");
      setThresholds(0);
    }
  }, [activeNav]);

  let { ref, inView } = useInView({
    root: null,
    threshold: thresholds,
    rootMargin: roots,
  });
  useEffect(() => {
    setActive(inView);
  }, [inView]);
  const [activeTab, setActiveTab] = useState(TabList[0].nameTab);
  const [activeTabList, setActiveTabList] = useState(TabList[0]);

  useEffect(() => {
    setActiveTabList(TabList.find((el) => el.nameTab == activeTab));
  }, [activeTab]);

  useEffect(() => {
    setActiveLowTab(activeTabList.categories[0].name);
    setActiveLink(activeTabList.categories[0].link);
  }, [activeTabList]);

  return (
    <>
      <nav
        className={style.TabNavigate}
        style={
          active
            ? { background: "unset", position: "sticky", marginRight: '0' }
            : {
                position: "fixed",
                background: "white",
                borderRadius: "0 0 28px 28px",
                boxShadow: "0px 10px 10px 0px rgba(32, 51, 79, 0.10)",
              }
        }
      >
        <div className={style.ProductsTab}>
          {TabList.map((el, index) => (
            <MainTab
              key={index}
              activeTab={activeTab}
              setActiveTab={setActiveTab}
            >
              {el.nameTab}
            </MainTab>
          ))}
        </div>
        <div className={style.ProductsTab}>
          {activeTabList.categories.map((el, index) => (
            <LowTab
              OLDsetActivePath={props.OLDsetActivePath}
              activeLowTab={activeLowTab}
              setActiveLowTab={setActiveLowTab}
              setActiveLink={setActiveLink}
              key={index}
              link={el.link}
              setActivePath={props.setActivePath}
            >
              {el.name}
            </LowTab>
          ))}
        </div>
        {props.activeNav ? <></> : !active ? <ScrollUp /> : <></>}
      </nav>
      <div
        ref={ref}
        style={!active ? { marginTop: "108px", height: "4px" } : {}}
      ></div>
    </>
  );
};

const MainTab = (props) => {
  const setActive = () => {
    props.setActiveTab(props.children);
  };
  const isActive = props.activeTab == props.children;
  return (
    <button
      onClick={setActive}
      style={
        isActive
          ? { background: "#6B35F5", color: "#FFF" }
          : { background: "#F1F3FB", color: "#8F92A1" }
      }
      className={style.MainTab}
    >
      {props.children}
    </button>
  );
};

const LowTab = (props) => {
  const setActive = () => {
    props.setActiveLink(props.link);
    props.setActiveLowTab(props.children);
    props.setActivePath();
    props.OLDsetActivePath();
  };
  const isActive = props.activeLowTab == props.children;
  return (
    <button
      onClick={setActive}
      style={
        isActive
          ? { background: "#F1F3FB", color: "#6B35F5" }
          : { background: "#FFF", color: "#8F92A1" }
      }
      className={style.MainTab}
    >
      {props.children}
    </button>
  );
};
export default ProductsTab;

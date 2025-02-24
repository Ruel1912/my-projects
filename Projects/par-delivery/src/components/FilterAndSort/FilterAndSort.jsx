"use client";
import { useContext, useEffect, useState } from "react";
import { PopupHeader, PopupSwipe } from "../CartCard/CartCard";
import styles from "./FilterAndSort.module.css";
import { CardContext } from "@/context/CardContext";
const FilterAndSort = (props) => {
  return (
    <div className={styles.FilterContain}>
      <SortPanel />
      <FilterPanel
        activeLowTab={props.activeLowTab}
        activeLink={props.activeLink}
        activePath={props.activePath}
        setActivePath={props.setActivePath}
        OLDactivePath={props.OLDactivePath}
        OLDsetActivePath={props.OLDsetActivePath}
      />
    </div>
  );
};

const FilterPanel = (props) => {
  const [filtres, setFiltres] = useState();
  // Запрос фильтров с моего склада
  useEffect(() => {
    fetch(`/api/filtres?tab=${props.activeLink}`)
      .then((res) => res.json())
      .then((res) => setFiltres(res.data)); //запись результата
  }, [props.activeLink]);

  return (
    filtres != null && (
      <Panel name="ic_Filters" title="Фильтры">
        <div className={styles.FilterPanel}>
          <h4>{props.activeLowTab}:</h4>
          {filtres.map((el) => (
            <DropDown
              OLDactivePath={props.OLDactivePath}
              OLDsetActivePath={props.OLDsetActivePath}
              activePath={props.activePath}
              setActivePath={props.setActivePath}
              first
              activeLink={props.activeLink}
              key={el.name}
              link={el.name}
              name={el.name}
              pathName={`${el.meta.href}`}
              oldPathName={`${el.pathName}/${el.name}`}
            />
          ))}
        </div>
      </Panel>
    )
  );
};

const SortPanel = () => {
  const { sortValue, setSortValue } = useContext(CardContext);
  const SORT_LIST = [
    { name: "По умолчанию" },
    { name: "Новинки" },
    { name: "Дешевле" },
    { name: "Дороже" },
  ];
  return (
    <Panel list={SORT_LIST} name="ic_Swap" title={sortValue}>
      {SORT_LIST.map((el) => (
        <button
          onClick={() => {
            setSortValue(el.name);
          }}
          className={styles.buttonList}
          key={el.name}
        >
          <p
            style={
              sortValue === el.name
                ? { color: "#6B35F5" }
                : { color: "#2B2B2B" }
            }
            className={styles.textList}
          >
            {el.name}
          </p>
          {sortValue === el.name && <i className="ic_Tick-Square" />}
        </button>
      ))}
    </Panel>
  );
};

const DropDown = (props) => {
  const OpenClick = () => {
    // кажется тут идёт запрос
    props.setActivePath(props.pathName);
    props.OLDsetActivePath(props.oldPathName);
  };
  const [filtres, setFiltres] = useState();
  const Go = () => {
    //Обновление списка
    fetch(`/api/filtres?tab=${props.activeLink}&other=${props.link}`)
      .then((res) => res.json())
      .then((res) => setFiltres(res.data));
  };

  useEffect(() => {
    if (props.OLDactivePath?.startsWith(props.oldPathName)) Go();
  }, []);
  return (
    <div
      style={
        props.first
          ? props.OLDactivePath?.startsWith(props.oldPathName)
            ? {
              borderBottom: "unset",
              paddingLeft: "0px",
              paddingBottom: "11px",
            }
            : {
              paddingLeft: "0px",
              borderBottom: "1px solid #8f92a133",
              paddingBottom: "8px",
            }
          : {
            paddingLeft: "22px",
            paddingBottom: "0px",
          }
      }
      className={styles.DropDown}
    >
      <button
        style={
          props.first
            ? { border: "none", paddingBottom: "0px" }
            : { border: "inhernit" }
        }
        className={
          props.OLDactivePath?.startsWith(props.oldPathName) ||
            props.oldPathName?.startsWith(props.OLDactivePath)
            ? `${styles.DropDownButton} ${styles.DropDownButtonOpen}`
            : styles.DropDownButton
        }
        onClick={() => {
          Go(), OpenClick();
        }}
      >
        {props.name}
        {props.OLDactivePath === props.oldPathName && (
          <i className="ic_Tick-Square" />
        )}
      </button>
      {props.OLDactivePath?.startsWith(props.oldPathName) && (
        <div className={styles.DropDownPanel}>
          {filtres?.length > 0 &&
            filtres.map((el) => (
              <DropDown
                OLDactivePath={props.OLDactivePath}
                OLDsetActivePath={props.OLDsetActivePath}
                activePath={props.activePath}
                setActivePath={props.setActivePath}
                activeLink={props.activeLink}
                key={props.link + "/" + el.name}
                link={props.link + "/" + el.name}
                name={el.name}
                oldPathName={`${el.pathName}/${el.name}`}
                pathName={el.meta.href}
              />
            ))}
        </div>
      )}
    </div>
  );
};

const getActiveColor = (name) => !['По умолчанию', 'Фильтры'].includes(name) ? "#6B35F5" : "#8f92a1"

const Panel = (props) => {
  const [isOpen, setIsOpen] = useState(false);
  return (
    <button onClick={() => setIsOpen(true)} className={styles.Filter}>
      <i style={{ color: getActiveColor(props.title) }} className={props.name}></i>
      <span style={{ color: getActiveColor(props.title) }}>{props.title}</span>
      <PopupSwipe
        footerText="Применить"
        footer
        isOpen={isOpen}
        setIsOpen={setIsOpen}
      >
        <PopupHeader
          back
          backClick={() => setIsOpen(false)}
          Title={props.title}
        />
        {props.children}
      </PopupSwipe>
    </button>
  );
};

export default FilterAndSort;

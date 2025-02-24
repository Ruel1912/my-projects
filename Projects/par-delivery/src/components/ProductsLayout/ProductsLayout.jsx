"use client";
import styles from "./ProductsLayout.module.css";
import ProductsTab from "../ProductsTab/ProductsTab";
import ProductsGrid from "../ProductsGrid/ProductsGrid";
import FilterAndSort from "../FilterAndSort/FilterAndSort";
import { useState } from "react";
function ProductsLayout(props) {
  const [activePath, setActivePath] = useState();
  const [OLDactivePath, OLDsetActivePath] = useState();
  const TabList = [
    {
      nameTab: "Вейп товары",
      categories: [
        {
          id: "0",
          name: "Электронки",
          link: "vape",
          filter: "/2. Одноразовые электронные испарители",
          endElements: 20,
        },
        {
          id: "1",
          name: "Жидкости",
          link: "liquid",
          filter: "/3. Жидкости для POD-систем",
          endElements: 20,
        },
        {
          id: "2",
          name: "Pod-сиcтемы",
          link: "podSystem",
          filter: "/4. POD-системы/Многоразовые POD-системы",
          endElements: 20,
        },
        {
          id: "3",
          name: `Картриджи\\Испарители`,
          link: "cartridge",
          filter: "/1. POD-системы/Испарители и Картриджи",
          endElements: 20,
        },
      ],
    },

    {
      nameTab: "Всё для Кальянов",
      categories: [
        {
          id: "0",
          name: "Табак",
          link: "tobacco",
          filter: "/4. Табачная продукция/Табаки и смеси для кальяна/Табак для кальяна",
          endElements: 20,
        },
        {
          id: "1",
          name: "Смеси",
          link: "tobaccoMix",
          filter: "/4. Табачная продукция/Табаки и смеси для кальяна/Бестабачные смеси для кальяна",
          endElements: 20,
        },
        {
          id: "2",
          name: "Уголь",
          link: "coal",
          filter: "/5. Уголь для кальяна/",
          endElements: 20,
        },
        {
          id: "3",
          name: "Аксессуары",
          link: "accessories",
          filter: "/6. Аксессуары для кальяна/",
          endElements: 20,
        },
        // {
        //   id: "4",
        //   name: "Аренда кальяна",
        //   link: "hookahRental",
        //   filter: "*не выводить*",
        //   endElements: 20,
        // },
      ],
    },

    {
      nameTab: "Альтернативный никотин",
      categories: [
        {
          id: "0",
          name: "Жевательный табак",
          link: "snus",
          filter: "/4. Табачная продукция/Табак жевательный",
          endElements: 20,
        },
        {
          id: "1",
          name: "Нюхательный табак",
          link: "snuf",
          filter: "/4. Табачная продукция/Табак нюхательный",
          endElements: 20,
        },
      ],
    },
  ];
  const [activeLowTab, setActiveLowTab] = useState(
    TabList[0].categories[0].name
  );
  const [activeLink, setActiveLink] = useState(TabList[0].categories[0].link);
  return (
    <div className={styles.ProductsContan}>
      <div className={`${styles.ProductsLayout} ProductsLayoutLabel`}>
        <ProductsTab
          TabList={TabList}
          activeLowTab={activeLowTab}
          setActiveLowTab={setActiveLowTab}
          activeLink={activeLink}
          setActiveLink={setActiveLink}
          setActivePath={setActivePath}
          OLDsetActivePath={OLDsetActivePath}
        />
        <FilterAndSort
          OLDactivePath={OLDactivePath}
          OLDsetActivePath={OLDsetActivePath}
          activePath={activePath}
          setActivePath={setActivePath}
          activeLowTab={activeLowTab}
          activeLink={activeLink}
        />
        <ProductsGrid
        
          activePath={OLDactivePath}
          activeLink={activeLink}
          cat={props.cat}
        />
      </div>
    </div>
  );
}

export default ProductsLayout;

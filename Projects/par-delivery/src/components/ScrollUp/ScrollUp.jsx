"use client";
import style from "./ScrollUp.module.css";

const ScrollUp = () => {
  return (
    <button onClick={ScrollToTop} className={style.ScrollUp}>
      <i className="ic_Arrow-Up-Full" />
    </button>
  );
};

const ScrollToTop = () => {
  var scroll = require("react-scroll").animateScroll;
  scroll.scrollToTop();
  // document.getElementById('gay').scrollTop=0
};


export default ScrollUp;

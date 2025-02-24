import React from "react";
import { HeaderOrder } from "../header/headerOrder";


const CardOrder = ({ children }) => {

  return (
    <>
      <HeaderOrder/>   
      {children}
      
    </>
  );
};

export default CardOrder;

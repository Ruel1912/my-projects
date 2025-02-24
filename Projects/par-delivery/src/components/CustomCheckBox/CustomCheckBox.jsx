'use client'
import { useState } from "react";

import './CustomCheckBox.css'
export const CustomCheckBox = ({ children, ...props }) => {
    const [checkboxState, setCheckboxState]=useState("CustomCheckBox active")
    const swapCheckboxState = () => {
      if (checkboxState == "CustomCheckBox"){
  
        setCheckboxState("CustomCheckBox active")
      }
      if (checkboxState == "CustomCheckBox active"){
        setCheckboxState("CustomCheckBox")
      }
    }
    return (
      <label onClick={swapCheckboxState} className={checkboxState}>
        <i className="ic_Apply" type="checkbox" {...props} />
        <span>{children}</span>
      </label>
    );
  };
  
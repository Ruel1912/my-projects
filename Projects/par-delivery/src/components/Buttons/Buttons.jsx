import "./Buttons.css";
export const BlueButton = ({ children, ...props }) => {
  return (
    <button className="BlueButton" {...props}>
      {children}
    </button>
  );
};

export const BlueButtonBig = ({ children, ...props }) => {
  return (
    <button className="BlueButton BlueButton2" {...props}>
      {children}
    </button>
  );
};
export const CardButtonBig = ({ children, ...props }) => {
  return (
    <button className="CardButtonBig" {...props}>
      {children}
    </button>
  );
};

export const CardMultiButtonBig = ({ children, ...props }) => {
  return (
    <div className="CardMultiButtonBig" {...props}>
      {children}
    </div>
  );
};

export const BurgerContactButton = (props) => {
  return (
    <button
      className={`BurgerContactButton ${props.longBtn}`}
      style={{ background: props.buttonColor }}
    >
      <i className={props.buttonIco}></i>
      <span>{props.children}</span>
    </button>
  );
};

export const SocialButton = (props) => {
  return (
    <button className={`SocialButton`} style={props.style}>
      <i className={props.buttonIco}></i>
      <span>{props.children}</span>
    </button>
  );
};

export const GoBackButtom = (props) => {
  return (
    <button style={props.styles} onClick={props.onClick} className={`GoBackButtom`}>
      <i style={{ fontSize: "12px" }} className="ic_Arrow-Left-Full" />
      Назад
    </button>
  );
};

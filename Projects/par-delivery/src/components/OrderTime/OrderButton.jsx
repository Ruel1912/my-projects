import styles from "./OrderButton.module.css";

const OrderButton = (props) => {
  return (
    <button onClick={props.onClick} className={styles.Contain}>
      <i className={props.className} />
      <p>{props.children}</p>
    </button>
  );
};

export default OrderButton;

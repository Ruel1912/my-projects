import styles from "./OrderCheckBox.module.css";

const OrderCheckBox = () => {
  return (
    <div className={styles.Contan}>
      <button><i className="ic_Apply" /></button>
      <p>Применить бонусную карту</p>
      <button><i className="ic_Danger-Circle" /></button>
    </div>
  );
};

export default OrderCheckBox;

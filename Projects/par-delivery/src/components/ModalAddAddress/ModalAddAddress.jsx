import { Dialog } from "@headlessui/react";
import styles from "./ModalAddAddress.module.css";
import { BlueButtonBig } from "../Buttons/Buttons";
import { Formik, Field, Form } from "formik";
export const ModalAddAddress = (props) => {
  const postAddress = (body) => {
    const requestOptions = {
      method: "POST",
      body: body,
      redirect: "follow",
    };

    fetch("/api/addresses", requestOptions)
      .then((response) => response.text())
      .then(() => {
        props.setActive(false);
        props.setActiveChange((el) => !el);
      })
      .catch((error) => console.log("error", error));
  };

  const patchAddress = (body) => {
    const requestOptions = {
      method: "PUT",
      body: body,
      redirect: "follow",
    };

    fetch("/api/addresses", requestOptions)
      .then((response) => response.text())
      .then(() => {
        props.setActive(false);
        props.setActiveChange((el) => !el);
      })
      .catch((error) => console.log("error", error));
  };

  return (
    <Dialog open={props.active} onClose={() => props.setActive(false)}>
      <div className={styles.bg}>
        <Dialog.Panel className={styles.panel}>
          <Formik
            initialValues={
              props.address
                ? {
                    id: props.address._id,
                    userid: props.address.userid,
                    address: props.address.address,
                    apartment: props.address.apartment,
                    porch: props.address.porch,
                    floor: props.address.floor,
                  }
                : {
                    userid: props.userId,
                    address: "",
                    apartment: "",
                    porch: "",
                    floor: "",
                  }
            }
            onSubmit={(values) => {
              const body = JSON.stringify(values, null, 2);
              props.address ? patchAddress(body) : postAddress(body);
            }}
          >
            <Form>
              <div className={styles.header}>
                <i className="ic_Location" />
                <h4>{props.address ? "Изменение" : "Добавление"} адреса</h4>
                <button onClick={() => props.setActive(false)}>
                  <i className="ic_Arrow-Close-Circle" />
                </button>
              </div>
              <div className={styles.inputGrid}>
                <div className={styles.inputGridChild}>
                  <InputModal name="address" type="text" label={"Адрес:"} />
                </div>
                <div className={styles.inputGridChild}>
                  <InputModal name="apartment" type="text" label={"Кв:"} />
                  <InputModal name="porch" type="text" label={"Пд-д"} />
                  <InputModal name="floor" type="text" label={"Этаж:"} />
                </div>
                <BlueButtonBig>{props.address ? "Изменить" : "Добавить"} адрес</BlueButtonBig>
              </div>
            </Form>
          </Formik>
        </Dialog.Panel>
      </div>
    </Dialog>
  );
};

const InputModal = ({ label, name, type }) => {
  return (
    // <div className={styles.inputContan}>
    <label className={styles.inputContan}>
      {label}
      <Field name={name} type={type} />
    </label>
    // </div>
  );
};

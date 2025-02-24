'use client';
import { Dialog } from "@headlessui/react";
import styles from "./ModalChangeUsername.module.css";
import { BlueButtonBig } from "../Buttons/Buttons";
import { signOut, useSession } from "next-auth/react";
import { Formik, Field, Form } from "formik";
import { useState } from 'react';
import { ModalPanel } from '@/components/ModalPanel/ModalPanel';

export const ModalChangeUsername = (props) => {

  const [isOpenLogout, setIsOpenLogout] = useState(false);

  const updateUsername = async (body) => {
    try {
      const response = await fetch("/api/users", {
        method: "PUT",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(body),
      });

      if (!response.ok) {
        throw new Error("Failed to update username");
      }

      props.setActive(false);
    } catch (error) {
      console.error("Error updating username:", error);
    }
  };

  const logout = () => signOut({ callbackUrl: "/login" });

  return (
    <>
      <Dialog open={props.active} onClose={() => props.setActive(false)}>
        <div className={styles.bg}>
          <Dialog.Panel className={styles.panel}>
            <Formik
              initialValues={
                {
                  userId: props.userId,
                  userName: "",
                }
              }
              onSubmit={async (values) => {
                await updateUsername(values);
                setIsOpenLogout(!isOpenLogout);
                setTimeout(() => {
                  logout();
                }, 2000);
              }}
            >
              <Form>
                <div className={styles.header}>
                  <i className="ic_Edit" />
                  <h4>Укажите дополнительные данные</h4>
                  <button onClick={() => props.setActive(false)}>
                    <i className="ic_Arrow-Close-Circle" />
                  </button>
                </div>
                <div className={styles.inputGrid}>
                  <div className={styles.inputGridChild}>
                    <InputModal name="userName" type="text" label={"Ваше имя"} />
                  </div>
                  <BlueButtonBig type="submit">Изменить</BlueButtonBig>
                </div>
              </Form>
            </Formik>
          </Dialog.Panel>
        </div>
      </Dialog>
      <ModalPanel
        ico="ic_Arrow-Reload"
        icoColor="#21AE0A"
        title={`Сейчас произойдет перезагрузка`}
        isOpen={isOpenLogout}
        setIsOpen={setIsOpenLogout}
      >
      </ModalPanel>
    </>
  );
};

const InputModal = ({ label, name, type }) => {
  return (
    <label className={styles.inputContan}>
      {label}
      <Field name={name} type={type} />
    </label>
  );
};

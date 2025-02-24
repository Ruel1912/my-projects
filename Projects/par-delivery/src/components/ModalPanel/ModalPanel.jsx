"use client";
import { Dialog } from "@headlessui/react";
import styles from "./ModalPanel.module.css";

export const ModalPanel = (props) => {

  const handleBackdropClick = (e) => {
    e.stopPropagation();
    if (props.backdropClick) {
      props.backdropClick();
    }
  };

  return (
    <Dialog
      open={props.isOpen}
      onClose={() => {
        if (!props.backdropClick) {
          props.setIsOpen(false);
        }
      }}
    >
      <div style={props.backdropStyle || {}} className={styles.bg}
        onClick={props.backdropClick ? handleBackdropClick : undefined}
      >
        <Dialog.Panel className={styles.panel}>
          <i style={{ color: props.icoColor }} className={props.ico} />
          <Dialog.Title className={styles.popupHead}>
            {props.title}
          </Dialog.Title>
          {props.children}
        </Dialog.Panel>
      </div>
    </Dialog>
  );
};

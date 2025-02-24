"use client";
import React, { useEffect, useState } from "react";
import styles from "./cardProfileContent.module.css";
import { useSession } from "next-auth/react";
import { ModalAddAddress } from "@/components/ModalAddAddress/ModalAddAddress";
import InputMask from 'react-input-mask';
import { BlueButton } from "../../Buttons/Buttons";
import { ModalPanel } from '@/components/ModalPanel/ModalPanel';
import Link from 'next/link';

export const BonusCardContent = (props) => {
  const session = useSession();
  const userId = session.data?.user.id;
  const [cards, setCards] = useState([]);
  const [value, setValue] = useState("");
  const postBonusCard = (userid, promoCard) => {
    const raw = JSON.stringify({
      userid: userid,
      promoCard: promoCard,
    });
    const requestOptions = {
      method: "POST",
      body: raw,
    };
    if (value !== "") {
      fetch(
        `/api/bonuscards?userid=${userId}`,
        requestOptions
      )
        .then((response) => response.json())
        .then(() => {
          getBonusCard();
          setValue("");
        })
        .catch((err) => console.error(err));
    }
  };
  const deleteBonusCard = () => {
    var requestOptions = {
      method: "DELETE",
    };

    fetch(
      `/api/bonuscards?userid=${userId}`,
      requestOptions
    )
      .then((response) => response.json())
      .then(() => getBonusCard())
      .catch((err) => console.error(err));
  };
  const getBonusCard = () => {
    var requestOptions = {
      method: "GET",
    };

    fetch(
      `/api/bonuscards?userid=${userId}`,
      requestOptions
    )
      .then((response) => response.json())
      .then((result) => setCards(result.bonusCards))
      .catch((e) => console.error(e));
  };

  // useEffect(getBonusCard, []);

  return cards.length ? (
    <div className={styles.RemoveBonusCard}>
      <p>
        {cards[0].promoCard}
        <i className="ic_Apply-Ring" />
      </p>

      <button onClick={() => deleteBonusCard()}>
        <i className="ic_Delete" />
      </button>
    </div>
  ) : (
    <div className={styles.AddBonusCard}>
      <input
        onChange={(e) => setValue(e.target.value)}
        type="number"
        placeholder="Введите номер телефона/бонусной"
      />
      <ButtonAdd onClick={postBonusCard} value={value} />
    </div>
  );
};


const getAddresses = (setAddresses, userId) => {
  var requestOptions = {
    method: "GET",
  };

  fetch(`/api/addresses?userid=${userId}`, requestOptions)
    .then((response) => response.json())
    .then((result) => setAddresses(result.addresses))
    .catch(() => setAddresses(null));
};




export const AddressContent = () => {
  const [active, setActive] = useState(false);
  const [activeChange, setActiveChange] = useState(false);
  const session = useSession();
  const userId = session.data?.user.id;
  const [addresses, setAddresses] = useState();

  useEffect(() => {
    getAddresses(setAddresses, userId);
  }, [activeChange]);

  return (
    <>
      <div className={styles.AddAddress}>
        <h4>Добавить новый адрес</h4>
        <ButtonAdd onClick={() => setActive(true)} />
      </div>
      <ModalAddAddress
        setActiveChange={setActiveChange}
        userId={userId}
        active={active}
        setActive={setActive}
      />
      {addresses?.map((el) => (
        <AddressList
          key={el._id}
          setActiveChange={setActiveChange}
          userId={userId}
          address={el}
        />
      ))}
    </>
  );
};

const AddressList = ({ userId, address, setActiveChange }) => {
  const id = address;
  const [active, setActive] = useState(false);
  const [deleteAddressModal, setDeleteAddressModal] = useState(false);
  const deleteAddress = () => {
    var requestOptions = {
      method: "DELETE",
    };
    fetch(`/api/addresses?id=${id._id}`, requestOptions)
      .then((response) => response.json())
      .then(() => setActiveChange((v) => !v))
      .catch((err) => console.error(err));
  };
  return (
    <>
      <div className={styles.AddressContain}>
        <div className={styles.аddress}>
          <h4>{address.address}</h4>
          <sub>
            {address.apartment} кв, {address.porch} подъезд, {address.floor}{" "}
            этаж
          </sub>
        </div>
        <div className={styles.CRUDbutton}>
          <button onClick={() => setActive(true)}>
            <i className="ic_Edit" />
          </button>
          <ModalPanel
            ico="ic_Delete"
            icoColor="#2b2b2b"
            title={`Удалить адрес?`}
            isOpen={deleteAddressModal}
            setIsOpen={setDeleteAddressModal}
          >
            <p
              style={{
                display: "flex",
                color: "#8F92A1",
                fontSize: "10px",
                fontWeight: "400",
                width: "70%",
                textAlign: "center",
                marginTop: "-14px",
              }}
            >
              Это действие невозвожно отменить
            </p>
            <div style={{ display: "flex", gap: "20px" }}>
              <BlueButton
                onClick={() => (deleteAddress(), setDeleteAddressModal(false))}
                style={{
                  boxShadow: "0px 1px 12px 0px rgba(32, 51, 79, 0.12)",
                  width: "120px",
                  fontSize: "14px",
                }}
              >
                Удалить
              </BlueButton>
              <BlueButton
                onClick={() => {
                  setDeleteAddressModal(false);
                }}
                style={{
                  background: "#E1E6F7",
                  color: "#6B35F5",
                  boxShadow: "0px 1px 12px 0px rgba(32, 51, 79, 0.12)",
                  width: " 120px",
                  fontSize: "14px",
                }}
              >
                Отменить
              </BlueButton>
            </div>
          </ModalPanel>
          <button onClick={() => setDeleteAddressModal(true)}>
            <i className={'ic_Delete'} />
          </button>
        </div>
      </div>
      <ModalAddAddress
        setActiveChange={setActiveChange}
        address={address}
        userId={userId}
        active={active}
        setActive={setActive}
      />
    </>
  );
};

export const PhoneContent = () => {
  const session = useSession();
  const userId = session?.data?.user?.id;
  const [cards, setCards] = useState([]);
  const [value, setValue] = useState("");
  const [deletePhoneModal, setDeletePhoneModal] = useState(false);
  const postPhone = (userid, phone) => {
    const raw = JSON.stringify({
      userid: userid,
      phone: phone,
    });
    const requestOptions = {
      method: "POST",
      body: raw,
    };
    if (value !== "") {
      fetch(`/api/phones?userid=${userId}`, requestOptions)
        .then((response) => response.json())
        .then(() => {
          getPhone();
          setValue("");
        })
        .catch((err) => console.error(err));
    }
  };
  const deletePhone = () => {
    var requestOptions = {
      method: "DELETE",
    };

    fetch(`/api/phones?userid=${userId}`, requestOptions)
      .then((response) => response.json())
      .then(() => getPhone())
      .catch((err) => console.error(err));
  };
  const getPhone = () => {
    var requestOptions = {
      method: "GET",
    };

    fetch(`/api/phones?userid=${userId}`, requestOptions)
      .then((response) => response.json())
      .then((result) => setCards(result.phones))
      .catch((e) => console.error(e));
  };

  useEffect(() => {
    if (userId) {
      getPhone()
    }
  }, [userId]);

  if (!userId) {
    return null;
  }

  return (
    <>
      <div className={styles.AddPhone}>
        <div className={styles.inputDiv}>
          <InputMask
            mask="+7 (999) 999 99 99"
            value={value}
            onChange={(e) => setValue(e.target.value)}
            placeholder="+7 (000) 000 00 00"
          >
            {(inputProps) => <input {...inputProps} type="tel" />}
          </InputMask>
        </div>
        <ButtonAdd onClick={postPhone} value={value} />
      </div>
      {cards.length ? (
        cards.map((card) => (
          <div key={card._id} className={styles.RemoveBonusCard}>
            <p>
              {card.phone}
              <i className="ic_Apply-Ring" />
            </p>

            <ModalPanel
              ico="ic_Delete"
              icoColor="#2b2b2b"
              title={`Удалить номер телефона?`}
              isOpen={deletePhoneModal}
              setIsOpen={setDeletePhoneModal}
            >
              <p
                style={{
                  display: "flex",
                  color: "#8F92A1",
                  fontSize: "10px",
                  fontWeight: "400",
                  width: "70%",
                  textAlign: "center",
                  marginTop: "-14px",
                }}
              >
                Это действие невозвожно отменить
              </p>
              <div style={{ display: "flex", gap: "20px" }}>
                <BlueButton
                  onClick={() => (deletePhone(), setDeletePhoneModal(false))}
                  style={{
                    boxShadow: "0px 1px 12px 0px rgba(32, 51, 79, 0.12)",
                    width: "120px",
                    fontSize: "14px",
                  }}
                >
                  Удалить
                </BlueButton>
                <BlueButton
                  onClick={() => {
                    setDeletePhoneModal(false);
                  }}
                  style={{
                    background: "#E1E6F7",
                    color: "#6B35F5",
                    boxShadow: "0px 1px 12px 0px rgba(32, 51, 79, 0.12)",
                    width: " 120px",
                    fontSize: "14px",
                  }}
                >
                  Отменить
                </BlueButton>
              </div>
            </ModalPanel>
            <button onClick={() => setDeletePhoneModal(true)}>
              <i className={'ic_Delete'} />
            </button>
          </div>
        ))
      ) : null}
    </>
  )
};

const ButtonAdd = (props) => {
  const session = useSession();
  const userId = session?.data?.user?.id;
  return (
    <button
      onClick={() => props.onClick(userId, props.value)}
      className={styles.ButtonAdd}
    >
      <i className="ic_Plus" />
    </button>
  );
};

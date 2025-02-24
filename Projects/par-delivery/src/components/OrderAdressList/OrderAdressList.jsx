"use client";
import { useEffect, useState } from "react";
import styles from "./OrderAdressList.module.css";
import { useSession } from "next-auth/react";
import { ModalAddAddress } from "../ModalAddAddress/ModalAddAddress";

const getAddresses = (setAddresses, userId) => {
  var requestOptions = {
    method: "GET",
  };

  fetch(`/api/addresses?userid=${userId}`, requestOptions)
    .then((response) => response.json())
    .then((result) => setAddresses(result.addresses))
    .catch(() => setAddresses(null));
};

const OrderAdressList = ({
  PickupErr,
  setPickupErr,
  AdressErr,
  setAdressErr,
  activePickup,
  setActivePickup,
  activeAddress,
  setActiveAddress,
  typeOrder,
}) => {
  useEffect(() => {
    // console.log(AdressErr);
  }, [AdressErr]);

  const [open, setOpen] = useState(false);
  useEffect(() => {
    // console.log('order', open);
  }, [open]);
  const [active, setActive] = useState(false);
  const [activeChange, setActiveChange] = useState(false);
  const session = useSession();
  const [addresses, setAddresses] = useState();
  const userId = session.data?.user.id;

  const HandleClickOpen = () => {
    if (open === false) {
      setOpen(true);
    } else {
      setOpen(false);
    }
  };

  useEffect(() => {
    getAddresses(setAddresses, userId);
  }, [activeChange]);

  useEffect(() => {
    if (addresses?.length === 0) setOpen(false);
  }, [addresses]);

  return typeOrder === false ? (
    <>
      <div
        className={`${styles.ScretchContain} ${open == true && AdressErr ? styles.errOutline : ""
          } ${AdressErr ? styles.errOutline : ""}`}
      >
        {addresses && addresses?.length !== 0 ? (
          <div
            className={`${styles.Contain} ${(open == false) && (AdressErr == true) && styles.errAddress
              }`}
          >
            {activeAddress != null ? (
              <div className={styles.Info}>
                <h5>{activeAddress.address}</h5>
                <p>
                  {activeAddress.apartment} кв, {activeAddress.porch} подъезд,{" "}
                  {activeAddress.floor} этаж
                </p>
              </div>
            ) : (
              <div className={styles.Info}>
                <h5>Выберите адрес</h5>
                <p>Из списка добавленных</p>
              </div>
            )}
            <button onClick={HandleClickOpen} className={styles.OpenBtn}>
              {open ? (
                <i
                  style={{ paddingTop: "0", paddingBottom: "2px" }}
                  className="ic_Arrow-Up"
                />
              ) : (
                <i className="ic_Arrow-Down" />
              )}
            </button>
          </div>
        ) : (
          <div style={{ display: "flex" }} className={styles.ContainCardAdd}>
            <div className={styles.Info}>
              <h5 style={{ color: "#2B2B2B" }}>Добавить новый адрес</h5>
              <p style={{ color: "#8F92A1" }}>
                Тут будут ваши сохраненные адреса
              </p>
            </div>
            <button onClick={() => setActive(true)} className={styles.AddBtn}>
              <i className="ic_Plus" />
            </button>
          </div>
        )}

        <div
          style={open ? { display: "flex" } : { display: "none" }}
          className={styles.ContainCardAdd}
        >
          <h5 style={{ color: "#2B2B2B" }}>Добавить новый адрес</h5>
          <button onClick={() => setActive(true)} className={styles.AddBtn}>
            <i className="ic_Plus" />
          </button>
        </div>

        {open &&
          addresses?.map((el) => (
            <AddressList
              key={el._id}
              setAdressErr={setAdressErr}
              userId={userId}
              address={el}
              setActiveChange={setActiveChange}
              setActiveAddress={setActiveAddress}
              activeAddress={activeAddress}
              setOpen={setOpen}
            />
          ))}
      </div>
      <ModalAddAddress
        setActiveChange={setActiveChange}
        userId={userId}
        active={active}
        setActive={setActive}
      />
    </>
  ) : (
    <>
      <div
        className={`${styles.ScretchContain} ${open == true && PickupErr == true ? styles.errOutline : ""
          }`}
      >
        <div
          className={`${styles.Contain} ${(open == false) & (PickupErr == true) && styles.errOutline
            }`}
        >
          {activePickup == null ? (
            <div className={styles.Info}>
              <h5>Выберите адрес</h5>
              <p>Из списка магазинов партнёров</p>
            </div>
          ) : (
            <div className={styles.Info}>
              <h5>Магазин Пармаркет</h5>
              <p>{activePickup.address}</p>
            </div>
          )}
          <button onClick={HandleClickOpen} className={styles.OpenBtn}>
            {open ? (
              <i
                style={{ paddingTop: "0", paddingBottom: "2px" }}
                className="ic_Arrow-Up"
              />
            ) : (
              <i className="ic_Arrow-Down" />
            )}
          </button>
        </div>
        {open && (
          <>
            <AddressShopList
              userId={userId}
              address={{
                _id: 1,
                address: "Воскресенская 15",
                userid: userId,
              }}
              setActiveChange={setActiveChange}
              setActivePickup={setActivePickup}
              activePickup={activePickup}
              setOpen={setOpen}
              setPickupErr={setPickupErr}
            />
            <AddressShopList
              userId={userId}
              address={{
                _id: 2,
                address: "Троицкий 3, ТЦ Атриум",
                userid: userId,
              }}
              setActiveChange={setActiveChange}
              setActivePickup={setActivePickup}
              activePickup={activePickup}
              setOpen={setOpen}
              setPickupErr={setPickupErr}
            />
            <AddressShopList
              userId={userId}
              address={{ _id: 3, address: "Тимме 9", userid: userId }}
              setActiveChange={setActiveChange}
              setActivePickup={setActivePickup}
              activePickup={activePickup}
              setOpen={setOpen}
              setPickupErr={setPickupErr}
            />
          </>
        )}
      </div>
    </>
  );
};
const AddressShopList = ({
  userId,
  address,
  setActiveChange,
  setActivePickup,
  activePickup,
  setOpen,
  setPickupErr,
}) => {
  return (
    <>
      <div
        style={{ display: "flex" }}
        className={`${styles.ContainCardAdd} ${styles.BeforeAddres}`}
      >
        <div
          className={styles.Info}
          onClick={() => {
            setActivePickup(address), setOpen(false), setPickupErr(false);
          }}
        >
          <h5
            style={
              activePickup?._id === address?._id
                ? { color: "#6B35F5", fontSize: "14px", fontWeight: 500 }
                : { color: "#2B2B2B", fontSize: "14px", fontWeight: 500 }
            }
          >
            Магазин Пармаркет
          </h5>
          <p style={{ color: "#8F92A1" }}>{address.address}</p>
        </div>
        <div className={styles.UDbutton}>
          <button style={{ opacity: 0 }} className={styles.EditBtn}></button>
        </div>
      </div>
    </>
  );
};
const AddressList = ({
  setAdressErr,
  userId,
  address,
  setActiveChange,
  setActiveAddress,
  activeAddress,
  setOpen,
}) => {
  const [active, setActive] = useState(false);
  const deleteAddress = (id) => {
    var requestOptions = {
      method: "DELETE",
    };
    fetch(`/api/addresses?id=${id}`, requestOptions)
      .then((response) => response.json())
      .then(() => setActiveChange((v) => !v), setActiveAddress(null))
      .catch((err) => console.error(err));
  };

  return (
    <>
      <div
        style={{ display: "flex" }}
        className={`${styles.ContainCardAdd} ${styles.BeforeAddres}`}
      >
        <div
          className={styles.Info}
          onClick={() => {
            setActiveAddress(address), setOpen(false), setAdressErr(false);
          }}
        >
          <h5
            style={
              activeAddress?._id === address?._id
                ? { color: "#6B35F5", fontSize: "14px", fontWeight: 500 }
                : { color: "#2B2B2B", fontSize: "14px", fontWeight: 500 }
            }
          >
            {address.address}
          </h5>
          <p style={{ color: "#8F92A1" }}>
            {address.apartment}кв, {address.porch} подъезд, {address.floor} этаж
          </p>
        </div>
        <div className={styles.UDbutton}>
          <button
            onClick={() => {
              setActive(true), setActiveAddress(null);
            }}
            className={styles.EditBtn}
          >
            <i className="ic_Edit" />
          </button>
          <button
            onClick={() => {
              deleteAddress(address._id);
            }}
            className={styles.DeleteBtn}
          >
            <i className="ic_Delete" />
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

export default OrderAdressList;

'use client';
import Image from "next/image";
import styles from "./ProfileContent.module.css";
import cat from "./cat.png";
import { useSession } from "next-auth/react";
import { OpenCardProfile } from "../OpenCardProfile/OpenCardProfile";
import {
  AddressContent,
  BonusCardContent,
  PhoneContent,
} from "../OpenCardProfile/cardProfileContent/cardProfileContent";
import { ModalChangeUsername } from '../ModalChangeUsername/ModalChangeUsername';
import { useState } from 'react';

export const ProfileContent = () => {
  const session = useSession();
  const userId = session.data?.user.id;
  const [active, setActive] = useState(false);
  const [activeChange, setActiveChange] = useState(false);
  return (
    <>
      <div className={styles.content}>
        <div className={styles.panel}>
          <div className={styles.panelHead}>
            <div className={styles.panelHello}>
              <i className="ic_Profile" />
              <div>
                <div style={{ display: "flex", gap: "4px" }}>
                  <h3>
                    {session?.data?.user?.name != null
                      ? session.data.user.name
                      : "Пользователь"}
                  </h3>
                  <button
                    onClick={() => setActive(true)}
                    style={{
                      border: "none",
                      background: "none",
                      width: "20px",
                      height: "20px",
                    }}
                  >
                    <i
                      style={{ color: "#C2D0FB", fontSize: "14px" }}
                      className="ic_Edit"
                    />
                  </button>
                </div>
                <p>Добро пожаловать!</p>
              </div>
            </div>
            <div className={styles.catContain}>
              <Image src={cat} alt='cat' width={cat.width} height={cat.height} />
            </div>
          </div>
          {/* TODO: Сделать бонусные карты */}
          {/* <OpenCardProfile
          ic_Name="ic_Ticket"
          text="Бонусная карта"
          sub="от магазина Пармаркет"
        >
          <BonusCardContent />
        </OpenCardProfile> */}
          <OpenCardProfile
            ic_Name="ic_Location"
            text="Мои адреса"
            sub="Список ваших адресов"
          >
            <AddressContent />
          </OpenCardProfile>
          <OpenCardProfile
            ic_Name="ic_Call"
            text="Номер телефона"
            sub="Список ваших номеров"
          >
            <PhoneContent />
          </OpenCardProfile>
          <div className={styles.socialLnk}>
            <span>Наши соц.сети:</span>
            <div>
              {/* <a
                className={`${styles.Vk} ${styles.socialCard}`}
                href="https://vk.com/par_delivery"
                target="_blank"
              >
                <i className="ic_Vk" />
                <span>вконтакте</span>
              </a> */}
              <a
                className={`${styles.Tg} ${styles.socialCard}`}
                href="https://t.me/par_delivery"
                target="_blank"
              >
                <i className="ic_Tg" />
                <span>телеграм</span>
              </a>
            </div>
          </div>
        </div>
      </div>
      <ModalChangeUsername
        userId={userId}
        active={active}
        setActive={setActive}
      />
    </>
  );
};

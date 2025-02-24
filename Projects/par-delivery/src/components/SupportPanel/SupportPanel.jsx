"use client";
import { useForm } from "react-hook-form";
import axios from "axios";
import styles from "./NavHelp.module.css";
import { BlueButtonBig } from "../Buttons/Buttons";
import { useEffect, useRef, useState } from "react";
import Link from "next/link";

export const SupportPanel = () => {
  const URL_API_FILE = `https://api.telegram.org/bot6466921292:AAGagoV889I4xQprS8pETyVaxtAfOWyplOA/sendDocument`;
  const URL_API_MESSAGE = `https://api.telegram.org/bot6466921292:AAGagoV889I4xQprS8pETyVaxtAfOWyplOA/sendMessage`;
  const [locate, setLocate] = useState(0);
  const [file, setFile] = useState();
  const PAR_SUPPORT_CHAT_ID = "-1002146224218";
  const { register, handleSubmit } = useForm();
  const onSubmit = (data) => {
    setLocate(1);
    let message = `<b>Форма обратной связи</b>\n`;
    message += `<b>Контакты отправителя:</b> ${data.contact}\n`;
    message += `<b>Проблема:</b> ${data.infoText}\n`;

    // console.log(data);
    if (data.file.length != 0) {
      const formData = new FormData();
      formData.append("chat_id", PAR_SUPPORT_CHAT_ID);
      formData.append("document", data.file[0]);
      formData.append("caption", message);
      formData.append("parse_mode", "html");

      axios.post(URL_API_FILE, formData, {
        headers: {
          "Content-Type": "multipart/form-data",
        },
      });
    }
    if (data.file.length == 0) {
      axios.post(URL_API_MESSAGE, {
        chat_id: PAR_SUPPORT_CHAT_ID,
        parse_mode: "html",
        text: message,
      });
    }
  };

  const processSelectedFiles = (fileInput) => {
    setFile(fileInput);
  };
  return (
    <>
      {locate == 0 ? (
        <div className={styles.MainContain}>
          <div>
            <h3 style={{ marginBottom: "24px" }}>Связаться с нами</h3>
            <div className={styles.PopupHelp}>
              <div>
                <i className="ic_Calling" />
                <h5>Поддержка Parovoz</h5>
              </div>
              <p>
                Расскажите подробее, что случилось, это поможет нам быстрее
                разобраться. Вы можете описать свой вопрос ниже или связаться с
                нами по телефону
              </p>
            </div>
          </div>
          <form onSubmit={handleSubmit(onSubmit)}>
            <div className={styles.Panel}>
              <h6>Контакты для связи</h6>
              <div className={styles.InputPanel}>
                <i className="ic_Message" />
                <input
                  {...register("contact", { required: true })}
                  placeholder="номер телефона/телеграм"
                />
              </div>
            </div>
            <div className={styles.Panel}>
              <h6>Комментарий</h6>
              <textarea
                {...register("infoText", { required: true })}
                placeholder="Опишите проблему, а мы придумаем как её решить!)"
              />
            </div>
            <div className={styles.Panel}>
              <h6>
                Добавить фото/видео{" "}
                <span style={{ fontSize: "10px", color: "#8F92A1" }}>
                  (не обязательно)
                </span>
              </h6>

              <label className={styles.fileInput}>
                <input
                  {...register("file")}
                  type="file"
                  onChange={(e) =>
                    processSelectedFiles(e.target.files[0]?.name)
                  }
                />
                <i className="ic_Paper-Plus" />
                {file == null ? "Загрузить" : file}
              </label>

              <div className={styles.applyButton}>
                <BlueButtonBig type="submit">Отправить</BlueButtonBig>
              </div>
            </div>
          </form>
        </div>
      ) : (
        <div
          style={{
            display: "flex",
            height: "100%",
            flexFlow: "column",
            alignItems: "center",
            gap: "8px",
          }}
          className={styles.MainContain}
        >
          <h3 style={{ alignSelf: "self-start", marginBottom: "24px" }}>
            Связаться с нами
          </h3>
          <i
            style={{
              color: "#6B35F5",
              fontSize: "178px",
              marginTop: "20%",
              marginBottom: "20%",
            }}
            className="ic_Scan"
          />
          <h2 style={{ fontSize: "20px", fontWeight: 500 }}>
            Ваш вопрос принят!
          </h2>
          <p
            style={{
              fontSize: "16px",
              fontWeight: 400,
              color: "#8F92A1",
              textAlign: "center",
            }}
          >
            Мы уже начали обрабатывать ваш вопрос,
            <br />
            Для уточнения данных с вами может <br />
            связаться наш менеджер
          </p>
          <div className={styles.applyButton}>
            <Link href="/main">
              <BlueButtonBig>На главную</BlueButtonBig>
            </Link>
          </div>
        </div>
      )}
    </>
  );
};

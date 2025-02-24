"use client";
import Image from "next/image";
import styles from "./Orderinfo.module.css";
import { placeholderPath } from '../Basket/basket';
const Orderinfo = ({ setMyLocate, price, prod, Bag }) => {
  const Dec = prod?.length % 10;
  return (
    <div className={styles.Contain} onClick={() => setMyLocate((e) => e - 1)}>
      <div className={styles.Info}>
        <div>
          <h5>Вы выбрали:</h5>
          <span>
            {prod?.length} позици
            {prod?.length >= 10 && prod?.length <= 20
              ? "й"
              : Dec === 1
                ? "я"
                : Dec >= 2 && Dec <= 4
                  ? "и"
                  : "й"}
          </span>
        </div>
        <div>
          <span
            style={{ fontSize: "12px", fontWeight: "500" }}
            className={styles.InfoStatus}
          >
            изменить
          </span>
          <h5 style={{ color: "#fff" }}>{price}₽</h5>
        </div>
      </div>
      <div className={styles.ImagesLine}>
        {
          prod?.length ? (
            prod.map((el) => (
              <div key={el.id} className={styles.ImagesContain}>
                <Image src={el.miniature != "#" ? el.miniature : placeholderPath} height={44} width={44} alt="" />
              </div>
            ))
          ) : null
        }
        {/* {prod?.length ? (
          prod.map((el) => (
            <Image key={el.id} src={el.miniature} height={44} width={44} alt="" />
          ))
        ) : null}
        {prod && prod?.length < 2 ? (
          <div className={styles.ImagesContain}></div>
        ) : (
          <div className={styles.ImagesContain}>
            {prod[1]?.miniature === "#" ? (
              <Image src={Bag} alt="" width={Bag.width} height={Bag.height} />
            ) : (
              <Image src={prod[1]?.miniature} height={44} width={44} alt="" />
            )}
          </div>
        )}

        {prod && prod?.length < 3 ? (
          <div className={styles.ImagesContain}></div>
        ) : (
          <div className={styles.ImagesContain}>
            {prod[2]?.miniature === "#" ? (
              <Image src={Bag} alt="" width={Bag.width} height={Bag.height} />
            ) : (
              <Image src={prod[2]?.miniature} alt="" />
            )}
          </div>
        )}
        {prod && prod?.length < 4 ? (
          <div className={styles.ImagesContain}></div>
        ) : (
          <div className={styles.ImagesContain}>
            {prod[3]?.miniature === "#" ? (
              <Image src={Bag} alt="" width={Bag.width} height={Bag.height} />
            ) : (
              <Image src={prod[3]?.miniature} alt="" />
            )}
          </div>
        )}
        {prod && prod?.length < 5 ? (
          <div className={styles.ImagesContain}></div>
        ) : (
          <div className={styles.ImagesContain}>
            {prod[4]?.miniature === "#" ? (
              <Image src={Bag} alt="" width={Bag.width} height={Bag.height} />
            ) : (
              <Image src={prod[4]?.miniature} alt="" />
            )}
          </div>
        )}
        {prod?.length === 6 || prod?.length < 6 ? (
          prod?.length < 6 ? (
            <div className={styles.ImagesContain}></div>
          ) : (
            <div className={styles.ImagesContain}>
              {prod[5]?.miniature === "#" ? (
                <Image src={Bag} alt="" width={Bag.width} height={Bag.height} />
              ) : (
                <Image src={prod[5]?.miniature} alt="" />
              )}
            </div>
          )
        ) : (
          <></>
        )}
        {prod?.length > 6 && (
          <div className={`${styles.ImagesContain} ${styles.FinalImage}`}>
            <span>+{prod?.length - 5}</span>
          </div>
        )} */}
      </div>
    </div>
  );
};

export default Orderinfo;

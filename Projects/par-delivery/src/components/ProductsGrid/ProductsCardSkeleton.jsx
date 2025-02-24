import style from "./ProductsGrid.module.css";

function ProductsCardSkeleton() {
  return (
    <div className={style.ProductsCard}>
      <div
        className={`${style.skeleton}`}
        style={{
          width: 'calc(100% - 12px)',
          minHeight: '200px',
          borderRadius: '24px',
          margin: '6px auto 0',
        }}
      ></div>
      <div className={style.ProductPrice}>
        <div>
          <h4
            className={`${style.skeleton}`}
            style={{
              textAlign: "left",
              width: '4rem',
              minHeight: '1rem',
              borderRadius: '8px',
            }}
          ></h4>
        </div>
      </div>
      <div
        style={{
          display: 'flex',
          flexDirection: 'column',
          gap: '5px',
          width: '100%',
          marginLeft: '24px',
          marginTop: '10px',
        }}
      >
        <span
          className={`${style.skeleton}`}
          style={{
            display: 'block',
            width: '10rem',
            minHeight: '1rem',
            borderRadius: '8px',
          }}
        ></span>
        <span
          className={`${style.skeleton}`}
          style={{
            display: 'block',
            width: '9rem',
            minHeight: '1rem',
            borderRadius: '8px',
          }}
        ></span>
        <span
          className={`${style.skeleton}`}
          style={{
            display: 'block',
            width: '7rem',
            minHeight: '1rem',
            borderRadius: '8px',
          }}
        ></span>
      </div>
      <div className={style.ButtonContain}>
        <div
          className={`${style.skeleton}`}
          style={{
            display: 'block',
            width: '100%',
            minHeight: '2rem',
            borderRadius: '60px',
          }}
        ></div>
      </div>
    </div>
  );
}

export default ProductsCardSkeleton;

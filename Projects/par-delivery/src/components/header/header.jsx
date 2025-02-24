import logo from "./logoText.svg";
import Image from "next/image";
import styles from "./header.module.css";
import Link from "next/link";
import { HeaderSidebarBtn } from "./HeaderSidebarBtn";
const Header = () => {
  return (
    <header className={styles.Header}>
      <div className={styles.HeaderSidebar}>
        <HeaderSidebarBtn />
      </div>
      <Link
        style={{
          height: "100%",
          display: "flex",
          alignItems: "center",
          justifyConent: "center",
          flexGrow: 1,
        }}
        href="/main"
      >
        <Image width={148} src={logo} alt="parovoz" />
      </Link>
      <div>
        <Link href="/liked">
          <i className="ic_Heart" />
        </Link>
        <Link href="/search">
          <i className="ic_Search" />
        </Link>
      </div>
    </header>
  );
};



export const HeaderTwo = (props) => {
  return (
    <header className={styles.HeaderTwo}>
      <div className={styles.HeaderRow}>
        <div className={styles.HeaderSidebar}>
          <HeaderSidebarBtn />
        </div>
        <Link
          style={{
            height: "100%",
            display: "flex",
            alignItems: "center",
            justifyConent: "center",
          }}
          href="/main"
        >
          <Image width={148} src={logo} alt="parovoz" />
        </Link>
        <div>
          <Link href="/main">
            <i className="ic_Home" />
          </Link>
        </div>
      </div>
      <div className={styles.HeaderNav}>
        {props.nav === "yes" && (
          <button>
            <i style={{ fontSize: "12px" }} className="ic_Arrow-Left-Full" />
            Назад
          </button>
        )}

        {props.children != null && (
          <h4 className={styles.HeaderName}>{props.children}</h4>
        )}
      </div>
    </header>
  );
};

export const HeaderThree = (props) => {
  return (
    <header className={styles.HeaderTwo}>
      <div className={styles.HeaderRow}>
        <div className={styles.HeaderSidebar}>
          <HeaderSidebarBtn />
        </div>
        <Link
          style={{
            height: "100%",
            display: "flex",
            alignItems: "center",
            justifyConent: "center",
          }}
          href="/main"
        >
          <Image width={148} src={logo} alt="parovoz" />
        </Link>
        <div>
          <Link href="/search">
            <i className="ic_Search" />
          </Link>
        </div>
      </div>
      <div className={styles.HeaderNav}>
        {props.nav != "no" ? (
          <Link href="/main">
            <i style={{ fontSize: "12px" }} className="ic_Arrow-Left-Full" />
            Назад
          </Link>
        ) : (
          <></>
        )}

        {props.children != null ? (
          <h4 className={styles.HeaderName}>{props.children}</h4>
        ) : (
          <></>
        )}
        {props.nav != "no" ? (
          <button style={{ opacity: "0" }}>
            <i style={{ fontSize: "12px" }} className="ic_Arrow-Left-Full" />
            Назад
          </button>
        ) : (
          <></>
        )}
      </div>
    </header>
  );
};

export default Header;

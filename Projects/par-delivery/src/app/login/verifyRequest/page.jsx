import { HeaderTwo } from "@/components/header/header";
import LayoutMain from "@/components/layoutMain/LayoutMain";
import { SideBarProvider } from "@/context/SideBarContext";
import styles from "../page.module.css";
import Cat from "../profileIco.svg";
import Image from "next/image";
import Link from "next/link";
import VerifyRequestLogic from "@/components/verifyRequestLogic/verifyRequestLogic";

const VerifyRequest = ({ searchParams }) => {
  // console.log(searchParams);
  return (
    <SideBarProvider>
      <LayoutMain>
        <HeaderTwo nav="no" />
        <div className={styles.mainContent}>
          <h4>Вход в акаунт:</h4>
          <div className={styles.helloContent}>
            <div>
              <Image width={86} height={94} src={Cat} alt="Профиль" />
            </div>
            <h5>Введите код из сообщения</h5>
            <p>
              Мы отправили его вашу почту
              <br />
              <span>{searchParams.email}</span>{" "}
              <Link style={{ color: "#6B35F5" }} href="/login">
                Изменить
              </Link>
            </p>
          </div>
          <VerifyRequestLogic email={searchParams.email}/>
        </div>
      </LayoutMain>
    </SideBarProvider>
  );
};

export default VerifyRequest;

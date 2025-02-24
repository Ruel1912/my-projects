import { CartCardButtonHome } from "@/components/CartCard/CartButton";
import { HeaderTwo } from "@/components/header/header";
import LayoutMain from "@/components/layoutMain/LayoutMain";
import { SideBarProvider } from "@/context/SideBarContext";
import styles from "../page.module.css";
import { GoBackButtom } from "@/components/Buttons/Buttons";
import { OrderCardId } from "@/components/OrderContent/Order_id";
import Link from "next/link";
import { HeaderLeftNav } from "@/components/header/HeaderSidebarBtn"

const OrderId = ({ params }) => {

  return (
    <main className={styles.main}>
      <SideBarProvider>
      <HeaderLeftNav />
        <LayoutMain>
          <HeaderTwo>
            <div
              style={{
                display: "grid",
                gridTemplateColumns: "70px 1fr 70px",
                alignItems: "center",
                marginBottom: "-7px",
                marginTop: "-5px",
              }}
            > <Link className={styles.backButton}  href='/order'><i className="ic_Arrow-Left-Full"/>Назад</Link>
              
              <span style={{ display: "flex", alignItems:'center', justifyContent:'center' }}>Заказ #{params.id.substring(params.id.length - 5)}</span>
            </div>
          </HeaderTwo>
          <div className={styles.content}>
            <OrderCardId id={params.id} />
          </div>
          {/* <CartCardButtonHome /> */}
        </LayoutMain>
      </SideBarProvider>


      

    </main>
  );
};



export default OrderId;

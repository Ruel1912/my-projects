import React from "react";
import LayoutMain from "@/components/layoutMain/LayoutMain";
import styles from "./page.module.css";
import { HeaderTwo } from "@/components/header/header";
import { SideBarProvider } from "@/context/SideBarContext";
import { ProfileContent } from "@/components/ProfileContent/ProfileContent";
import { getServerSession } from "next-auth";
import { HeaderLeftNav } from "@/components/header/HeaderSidebarBtn"

const  Profile = async () => {
  // const session = await getServerSession()
  // console.log(session)
  return (
    <main className={styles.main}>
      <SideBarProvider>
      <HeaderLeftNav />
        <LayoutMain>
          <HeaderTwo nav="no">
            <span style={{ display: "flex", marginLeft: "-7px" }}>
              Личный кабинет:
            </span>
          </HeaderTwo>
          <ProfileContent />
        </LayoutMain>
      </SideBarProvider>
    </main>
  );
};

export default Profile;

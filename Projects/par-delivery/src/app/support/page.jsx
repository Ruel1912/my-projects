import { SupportPanel } from "@/components/SupportPanel/SupportPanel";
import { HeaderTwo } from "@/components/header/header";
import LayoutMain from "@/components/layoutMain/LayoutMain";
import { SideBarProvider } from "@/context/SideBarContext";
import { HeaderLeftNav } from "@/components/header/HeaderSidebarBtn";
import React from "react";

const Support = () => {
  return (
    <SideBarProvider>
      <HeaderLeftNav />
      <LayoutMain>
        <HeaderTwo nav="no" />
        <SupportPanel />
      </LayoutMain>
    </SideBarProvider>
  );
};

export default Support;

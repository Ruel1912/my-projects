import LayoutMain from "@/components/layoutMain/LayoutMain";
import { HeaderThree } from "@/components/header/header";
import CartCard from "@/components/CartCard/CartCard";
import { SideBarProvider } from "@/context/SideBarContext";
import LikeTable from "@/components/likeTable/likeTable";
import { HeaderLeftNav } from "@/components/header/HeaderSidebarBtn"

export default function Liked() {
  return (
      <SideBarProvider>
        <HeaderLeftNav />
         <LayoutMain>
           <HeaderThree>Избранные товары:</HeaderThree>
           <LikeTable />
           <CartCard />
        </LayoutMain> 
      </SideBarProvider>
  );
};

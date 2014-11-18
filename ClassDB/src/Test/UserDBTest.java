
package Test;

import classdb.UserDB;
import java.sql.Connection;
import java.util.ArrayList;
import Connexion.*;

public class UserDBTest {
    static Connection dbconnect; 
    UserDB instance;
    public UserDBTest() {
    }

    public static void setUpClass() throws Exception {
        DBConnection dbc=new DBConnection();
        dbconnect=dbc.getConnection();
        UserDB.setConnection(dbconnect);
    }

    public static void tearDownClass() throws Exception {
        dbconnect.close();
    }
    
    public void setUp() {
        instance= new UserDB("Martin","Rich","BOB","yolo",0);
      try{ 
        instance.create();
      }
      catch(Exception e){
          System.out.println("erreur "+e);
      }
    }
    
    public void tearDown() {
      try{  
        instance.delete();
      }
      catch(Exception e){
          System.out.println("erreur "+e);
      }
        
    }

  //  @Test
    public void testSetConnection() {
        System.out.println("setConnection");
        Connection nouvdbConnect = null;
        UserDB.setConnection(nouvdbConnect);
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of create method, of class ClientDB.
     */
    
    public void testCreate() throws Exception {
        System.out.println("create");
        UserDB instance = new UserDB("TestNom2","TestPrenom2","testlogin2","testmp",0);
        instance.create();
        int idcl=instance.iduser;
        assertTrue("id client positif",idcl>0);
        instance.delete();
    }

    /**
     * Test of read method, of class ClientDB.
     */
  @Test
    public void testRead() throws Exception {
        System.out.println("read");
        instance.read();
        String nom=instance.nom;
        assertEquals("egalite des noms ",nom,"TestNom");
    }

    /**
     * Test of rechNom method, of class ClientDB.
     */
  //  @Test
    public void testRechNom() throws Exception {
        System.out.println("rechNom");
        String nomrech = "";
        ArrayList expResult = null;
        ArrayList result = ClientDB.rechNom(nomrech);
        assertEquals(expResult, result);
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of update method, of class ClientDB.
     */
  //  @Test
    public void testUpdate() throws Exception {
        System.out.println("update");
        instance.prenom="nouvprenom";
        instance.update();
        instance.read();
        assertEquals("nom modifie",instance.prenom,"nouvprenom");
     
        instance.update();
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of delete method, of class ClientDB.
     */
 //   @Test
    public void testDelete() throws Exception {
        System.out.println("delete");
        ClientDB instance = new ClientDB();
        instance.delete();
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }
}

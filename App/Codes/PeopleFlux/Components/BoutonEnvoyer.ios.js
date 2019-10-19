import React from 'react'
import { StyleSheet, View, Button, Alert} from 'react-native'

class BoutonEnvoyer extends React.Component {
  render(){
    return(
      <View style={styles.btn_envoie}>
      <Button
        title='Envoyer'
        color= '#fff'
        onPress={() => Alert.alert('Pas disponible actuellement')}
      />

      </View>
    )
  }
}
const styles = StyleSheet.create({
  btn_envoie:{
  borderWidth:1,
  backgroundColor: '#ff5733',
  borderRadius:30,
  marginTop:25,
  marginLeft:6,
  marginRight:6,
  }
})

export default BoutonEnvoyer

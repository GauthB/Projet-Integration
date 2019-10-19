import React from 'react'
import { StyleSheet, View, Text, Platform } from 'react-native'
import {KeyboardAwareScrollView} from 'react-native-keyboard-aware-scrollview'




class Calendrier extends React.Component {


  render() {
    return (
      <View style={styles.main_container}>

        <KeyboardAwareScrollView
          enableOnAndroid={true}
          enableAutomaticScroll={(Platform.OS === 'ios')}
        >
            <Text style={styles.text_calendrier}>Calendrier</Text>
            <View style={styles.bordure}>
              <View style={styles.event_date}>
                <Text style={styles.text_event}>24h Vélo</Text>
                <Text style={styles.text_date}>23 octobre 2019</Text>
              </View>
              <Text style={styles.text_lieux}>Louvain-La-Neuve</Text>
            </View>
            <View style={styles.bordure}>
              <View style={styles.event_date}>
                <Text style={styles.text_event}>Solidarité</Text>
                <Text style={styles.text_date}>15-20 juillet 2020</Text>
              </View>
              <Text style={styles.text_lieux}>Namur</Text>
            </View>
            <View style={styles.bordure}>
              <View style={styles.event_date}>
                <Text style={styles.text_event}>WSF</Text>
                <Text style={styles.text_date}>18-23 août 2020</Text>
              </View>
              <Text style={styles.text_lieux}>Louvain-La-Neuve</Text>
            </View>
            <View style={styles.bordure}>
              <View style={styles.event_date}>
                <Text style={styles.text_event}>BSF</Text>
                <Text style={styles.text_date}>3-6 mai 2020</Text>
              </View>
              <Text style={styles.text_lieux}>Bruxelles</Text>
            </View>

        </KeyboardAwareScrollView>
      </View>
    )
  }
}

const styles = StyleSheet.create({
  main_container: {
    flex: 1,
    backgroundColor: '#232531',

  },
  text_calendrier:{
    fontSize:30,
    color:'#c70039',
    marginLeft:10,
    marginTop:10,
    marginBottom : 30
  },

  bordure:{
    height: 60,
    borderColor: '#4B4C56',
    marginTop: 20,
    marginLeft:6,
    marginRight:6,
    borderRadius:30,
    backgroundColor: '#4B4C56',
  },
  event_date:{
    flexDirection:'row'
  },
  text_event:{
    fontWeight : 'bold',
    fontSize: 25,
    color: '#ff5733',
    marginLeft: 20,
    marginTop: 10
  },
  text_date:{
    fontSize: 15,
    color: '#fff',
    marginLeft: 50,
    marginTop: 20,
    position: 'absolute',
    right: 20
  },
  text_lieux:{
    fontSize: 10,
    color: '#fff',
    marginLeft: 20,

  }
})

export default Calendrier

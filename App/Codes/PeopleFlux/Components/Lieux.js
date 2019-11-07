import React, {Component} from 'react'
import { StyleSheet, View, Text, Picker, Image, TouchableOpacity } from 'react-native'
import RNPickerSelect from 'react-native-picker-select';


class Lieux extends React.Component {

  constructor(props) {
    super(props)
    this.state = {
      selectedValue: null,
    }

  }

  render() {
    return (
      <View style={styles.main_container}>
        <Text style={styles.text_lieu}>Lieux</Text>

            <View style={styles.picker_container}>
              <View style={styles.evenements_text_container}>
                <Text style={styles.text_evenements} >Evenements : </Text>
              </View>
              <View style={styles.pickerSelect_container}>
                <RNPickerSelect
                  style={pickerStyle}
                  onValueChange={(value) => this.setState({selectedValue: value})}
                  placeholder= {{}}
                  mode="dropdown"
                  items={[
                    { label: '24h Velo', value: '24hvelo' },
                    { label: 'BSF', value: 'BSF' },
                    { label: 'Welcome Spring', value: 'WelcomeSpring' },
                  ]}
                />
              </View>
            </View>


          <View styles={styles.content_container}>
            <Image
              style ={styles.image}
              source={require('../Images/lieux.jpg')}
            />
          </View>
      </View>
    )
  }
}

const pickerStyle = {
	inputIOS: {
		color: '#c70039',
    fontSize:15,
    textAlign:'center',


	},
	inputAndroid: {
		color: '#c70039',
    paddingLeft:10,
    fontSize:15,

    textAlign:'center'
	},
	placeholderColor: 'red',
	underline: { borderTopWidth: 0 },

};

const styles = StyleSheet.create({
  main_container: {
    flex: 1,
    backgroundColor: '#232531'
  },

  text_lieu:{
    fontSize:30,
    color:'#c70039',
    marginLeft:10,
    marginTop:10
  },
  head_container:{
    flexDirection: 'row',
    flex:1
  },
  text_evenements:{
    fontSize:20,
    color:'white',
    marginLeft:10,
    marginTop:5,
    width:150

  },

  picker_container:{
    flexDirection:'row',


  },
  evenements_text_container:{
    flex:5,
    color: 'white',
    fontSize:20
  },
  pickerSelect_container:{
    flex:6,
    justifyContent:'center',
    alignItems:'center',
    color:'#c70039',
    backgroundColor:'white',
    height:30,
    borderRadius: 20,
    borderWidth: 1,
    borderColor: '#bdc3c7',
    marginTop:3,
    marginRight:50


  },
  content_container:{
    justifyContent:'center',
    alignItems:'center',
    flex:1
  },
  image:{
    height:500,
    width:350,
    marginLeft:5,
    marginTop:50
  }
})

export default Lieux
